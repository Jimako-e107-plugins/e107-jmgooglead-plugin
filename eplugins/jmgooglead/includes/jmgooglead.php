<?php

/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* JM Google Ad - shared logic class.
*
* Single source of truth for the plugin's runtime behaviour. e_meta.php,
* e_footer.php and e_shortcode.php all delegate here so the loader/ad/blocked
* logic exists in exactly one place. Instantiated lazily via
* e107::getSingleton('jmgooglead', e_PLUGIN.'jmgooglead/includes/jmgooglead.php').
*/

if(!defined('e107_INIT'))
{
	exit;
}

if(!class_exists('jmgooglead'))
{
	class jmgooglead
	{
		/**
		 * Return the AdSense loader snippet as raw HTML, or '' when it should not
		 * be emitted.
		 *
		 * The loader is only rendered when the admin has enabled the global switch
		 * and pasted a non-empty script. The snippet may be pasted with OR without
		 * the surrounding <script>...</script> tags; either way exactly one
		 * <script> element is emitted.
		 *
		 * @return string
		 */
		public function renderLoaderScript()
		{
			$prefs = e107::getPlugPref('jmgooglead');

			$global = !empty($prefs['googleads_global']);
			$script = isset($prefs['googleads_script']) ? trim($prefs['googleads_script']) : '';

			if(!$global || $script === '')
			{
				return '';
			}

			// charset argument is mandatory: PHP < 8.1 defaults to ISO-8859-1.
			$code = html_entity_decode($script, ENT_QUOTES, 'UTF-8');
			$code = trim($code);

			if($code === '')
			{
				return '';
			}

			// Normalise: the admin may paste the snippet with or without the
			// surrounding <script> tags. Only wrap it when there is no <script>
			// tag anywhere in the snippet.
			//
			// This MUST be "contains" (=== false), not "starts with" (!== 0). A
			// real AdSense snippet is routinely pasted with a leading HTML comment
			// or blank line ("<!-- Google AdSense -->\n<script ...>"), which does
			// not *start* with <script; a "!== 0" test would then wrap an already
			// present <script> in a second one, producing a nested and broken
			// <script><script ...></script></script>.
			if(stripos($code, '<script') === false)
			{
				$code = '<script>' . $code . '</script>';
			}

			return $code;
		}

		/**
		 * Return the AdSense loader snippet for a given output position, or ''
		 * when it must not be emitted there.
		 *
		 * Bundles the three decisions a caller must make before printing the
		 * loader into one place: the current page must not be on the block list,
		 * the requested position must match the configured googleads_position
		 * preference, and the loader must be enabled and non-empty (delegated to
		 * renderLoaderScript()). Any integration - e_meta.php, e_footer.php or a
		 * third-party front end - can therefore decide whether to print with a
		 * single call and without duplicating this logic.
		 *
		 * @param string $position 'head' or 'body_end'
		 * @return string
		 */
		public function renderLoaderForPosition($position)
		{
			if($this->isPageBlocked())
			{
				return '';
			}

			$configured = e107::getPlugPref('jmgooglead', 'googleads_position', 'head');

			if($configured !== $position)
			{
				return '';
			}

			return $this->renderLoaderScript();
		}

		/**
		 * Return one ad unit's code as raw HTML, or '' when it must not be shown.
		 *
		 * Respects the current page block list, the ad's active flag and the ad's
		 * userclass visibility. The id is cast to int before it touches SQL.
		 *
		 * @param int $id ad record id
		 * @return string
		 */
		public function renderAd($id)
		{
			$id = (int) $id;

			if($id < 1)
			{
				return '';
			}

			// Never render a live ad inside the e107 admin area. USER_AREA is
			// defined (and false) only there; on UnitedNuke pages it is not
			// defined at all, which must be treated as "not the admin area"
			// rather than as a block - hence the defined() test.
			if(defined('USER_AREA') && !USER_AREA)
			{
				return '';
			}

			if($this->isPageBlocked())
			{
				return '';
			}

			// Fetch the row via a bound/parameterised query and evaluate
			// visibility in PHP rather than in SQL. The (int) cast above already
			// makes $id safe, but the bound parameter keeps the query free of
			// string concatenation as defence in depth.
			$sql = e107::getDb();
			$count = $sql->select(
				'jmgooglead',
				'googlead_code, googlead_active, googlead_class',
				'googlead_id=:id',
				array('id' => $id)
			);

			if(empty($count))
			{
				return '';
			}

			$row = $sql->fetch();

			if(empty($row))
			{
				return '';
			}

			if(empty($row['googlead_active']))
			{
				return '';
			}

			$code = isset($row['googlead_code']) ? $row['googlead_code'] : '';

			if($code === '')
			{
				return '';
			}

			// Userclass visibility check via the native e107 API. check_class()
			// handles a single id or a comma-separated list and compares against
			// the current visitor's USERCLASS_LIST.
			$class = isset($row['googlead_class']) ? $row['googlead_class'] : '';

			if($class !== '' && !check_class($class))
			{
				return '';
			}

			return html_entity_decode($code, ENT_QUOTES, 'UTF-8');
		}

		/**
		 * Decide whether the current request URL is on the admin-defined block
		 * list (googleads_blockpages, one page fragment per line).
		 *
		 * Empty / whitespace-only lines are discarded first: strpos($haystack, '')
		 * returns 0 (!== false), so a single blank line in the textarea would
		 * otherwise match every URL and disable ads across the whole site.
		 *
		 * @return bool
		 */
		public function isPageBlocked()
		{
			$blockpages = e107::getPlugPref('jmgooglead', 'googleads_blockpages', '');

			if(!is_string($blockpages) || trim($blockpages) === '')
			{
				return false;
			}

			// NOTE: e_REQUEST_URL is the *full* request url string INCLUDING the
			// domain (e.g. https://example.com/page), per e107 core. The block
			// list is therefore matched against the domain as well as the path,
			// so an admin who enters their own domain (or any fragment of it)
			// will match every page and silently disable ads site-wide. The
			// admin help string warns about this.
			$request_url = e_REQUEST_URL;
			$c_url = str_replace('&amp;', '&', $request_url);
			$c_url = rtrim(rawurldecode($c_url), '?');

			$lines = explode("\n", str_replace("\r", '', $blockpages));

			foreach($lines as $line)
			{
				$line = trim($line);

				if($line === '')
				{
					// Skip blank lines - never match on an empty needle.
					continue;
				}

				if(strpos($c_url, $line) !== false)
				{
					return true;
				}
			}

			return false;
		}
	}
}
