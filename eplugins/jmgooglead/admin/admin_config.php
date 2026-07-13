<?php

/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* JM Google Ad - preferences admin entry point.
*
* Preferences only (the loader script, global toggle, position and page block
* list). Ad-unit CRUD lives in admin_adunits.php. Both share admin_menu.php. The
* plugin is main-admin-only (it stores and outputs raw third-party HTML/JS
* verbatim), so the entry gate requires getperms('0'); the dispatcher's
* $perm = '0' enforces the same on every route hit by URL.
*/

require_once '../../../class2.php';   // admin/ -> jmgooglead -> eplugins -> root

if(!getperms('0'))
{
	e107::redirect('admin');
	exit;
}

include 'admin_menu.php';

class jmgooglead_prefs_ui extends e_admin_ui
{
	protected $pluginTitle = LAN_JMGOOGLEAD_ADMIN_01;
	protected $pluginName  = 'jmgooglead';

	protected $table = '';   // preferences page: no table bound

	protected $prefs = array(
		'googleads_script'     => array(
			'title' => LAN_JMGOOGLEAD_ADMIN_SCRIPT,
			'tab'   => 0,
			'type'  => 'textarea',
			// 'code' stores the snippet verbatim: it maps to toDB(..,'pReFs'),
			// which skips cleanHtml() and so preserves <script> and crossorigin
			// without touching any site-wide content-filter pref. 'str' would
			// route through cleanHtml() and mangle both.
			'data'  => 'code',
			'help'  => LAN_JMGOOGLEAD_ADMIN_SCRIPT_HELP,
			'writeParms' => array('size' => 'block-level'),
		),
		'googleads_global'     => array(
			'title' => LAN_JMGOOGLEAD_ADMIN_GLOBAL,
			'tab'   => 0,
			'type'  => 'boolean',
			'data'  => 'int',
			'help'  => LAN_JMGOOGLEAD_ADMIN_GLOBAL_HELP,
		),
		'googleads_position'   => array(
			'title' => LAN_JMGOOGLEAD_ADMIN_POSITION,
			'tab'   => 0,
			'type'  => 'dropdown',
			'data'  => 'str',
			'help'  => LAN_JMGOOGLEAD_ADMIN_POSITION_HELP,
			'writeParms' => array(
				'optArray' => array(
					'head'     => LAN_JMGOOGLEAD_ADMIN_POSITION_HEAD,
					'body_end' => LAN_JMGOOGLEAD_ADMIN_POSITION_BODY,
				),
			),
		),
		'googleads_blockpages' => array(
			'title' => LAN_JMGOOGLEAD_ADMIN_BLOCKPAGES,
			'tab'   => 0,
			'type'  => 'textarea',
			'data'  => 'str',
			'help'  => LAN_JMGOOGLEAD_ADMIN_BLOCKPAGES_HELP,
			'writeParms' => array('size' => 'block-level'),
		),
	);

	/**
	 * Sidebar help block for the preferences page. Rendered by e107 into the
	 * admin sidebar (registry core/e107/adminui/help). The LAN text carries its
	 * own light markup (<code>), so it is not run through htmlentities().
	 *
	 * @return array
	 */
	public function renderHelp()
	{
		return array('caption' => LAN_HELP, 'text' => LAN_JMGOOGLEAD_ADMIN_PREFS_HELP);
	}
}

class jmgooglead_prefs_form_ui extends e_admin_form_ui
{
}

new jmgooglead_prefs_dispatcher();

require_once e_ADMIN . "auth.php";

e107::getAdminUI()->runPage();

require_once e_ADMIN . "footer.php";
exit;
