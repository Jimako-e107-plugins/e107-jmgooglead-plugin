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
			// surrounding <script> tags. Emit exactly one <script> element and
			// never nest them. Case-insensitive check for a leading <script tag.
			if(stripos($code, '<script') !== 0)
			{
				$code = '<script>' . $code . '</script>';
			}

			return $code;
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

			if($this->isPageBlocked())
			{
				return '';
			}

			// $id is an int, so this WHERE clause cannot be injected. Fetch the
			// row and evaluate visibility in PHP rather than in SQL.
			$sql = e107::getDb();
			$row = $sql->retrieve(
				'jmgooglead',
				'googlead_code, googlead_active, googlead_class',
				'googlead_id=' . $id
			);

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
