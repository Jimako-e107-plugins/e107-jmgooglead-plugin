<?php

/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* JM Google Ad - ad-unit CRUD admin entry point.
*
* Generic CRUD over the jmgooglead table (each row is one ad unit, placed with
* the {JM_GOOGLE_AD: id=X} shortcode). Preferences live in admin_config.php.
* Both share admin_menu.php. Main-admin-only: the getperms('0') gate below plus
* the dispatcher's $perm = '0' block every route for non-main admins.
*/

require_once '../../../class2.php';   // admin/ -> jmgooglead -> eplugins -> root

if(!getperms('0'))
{
	e107::redirect('admin');
	exit;
}

include 'admin_menu.php';

class jmgooglead_adunits_ui extends e_admin_ui
{
	protected $pluginTitle = LAN_JMGOOGLEAD_ADMIN_ADUNITS;
	protected $pluginName  = 'jmgooglead';

	protected $table       = 'jmgooglead';
	protected $pid         = 'googlead_id';
	protected $perPage     = 20;
	protected $batchDelete = true;
	protected $batchCopy   = true;
	protected $listOrder   = 'googlead_id DESC';

	protected $fields = array(
		'checkboxes'      => array('title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'forced' => true, 'thclass' => 'center', 'class' => 'center', 'toggle' => 'e-multiselect'),
		'googlead_id'     => array('title' => LAN_ID, 'data' => 'int', 'width' => '5%', 'forced' => true, 'readonly' => true),
		'googlead_name'   => array('title' => LAN_TITLE, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'inline' => true, 'writeParms' => array('size' => 'block-level')),
		'googlead_gaid'   => array('title' => LAN_JMGOOGLEAD_ADMIN_GAID, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'help' => LAN_JMGOOGLEAD_ADMIN_GAID_HELP, 'writeParms' => array('size' => 'block-level')),
		// 'code' stores the ad snippet verbatim (toDB(..,'pReFs') skips
		// cleanHtml()), preserving <script>/crossorigin without any site-wide
		// content-filter change. 'str' would strip them.
		'googlead_code'   => array('title' => LAN_JMGOOGLEAD_ADMIN_CODE, 'type' => 'textarea', 'data' => 'code', 'width' => 'auto', 'help' => LAN_JMGOOGLEAD_ADMIN_CODE_HELP, 'writeParms' => array('size' => 'block-level')),
		'googlead_note'   => array('title' => LAN_DESCRIPTION, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'help' => LAN_JMGOOGLEAD_ADMIN_NOTE_HELP, 'writeParms' => array('size' => 'block-level')),
		'googlead_active' => array('title' => LAN_ACTIVE, 'type' => 'boolean', 'data' => 'int', 'width' => 'auto', 'filter' => true, 'inline' => true, 'help' => LAN_JMGOOGLEAD_ADMIN_ACTIVE_HELP),
		'googlead_class'  => array('title' => LAN_VISIBILITY, 'type' => 'userclass', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'help' => LAN_JMGOOGLEAD_ADMIN_CLASS_HELP),
		'options'         => array('title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'forced' => true, 'thclass' => 'center last', 'class' => 'center last'),
	);

	protected $fieldpref = array('googlead_id', 'googlead_name', 'googlead_gaid', 'googlead_note', 'googlead_active', 'googlead_class');

	/**
	 * Sidebar help block for the ad-units page. Rendered by e107 into the admin
	 * sidebar (registry core/e107/adminui/help). The LAN text carries its own
	 * markup (<code>) and a shortcode example whose braces are HTML-escaped
	 * (&#123;/&#125;), so it must not be run through htmlentities().
	 *
	 * @return array
	 */
	public function renderHelp()
	{
		return array('caption' => LAN_HELP, 'text' => LAN_JMGOOGLEAD_ADMIN_ADUNITS_HELP);
	}
}

class jmgooglead_adunits_form_ui extends e_admin_form_ui
{
}

new jmgooglead_adunits_dispatcher();

require_once e_ADMIN . "auth.php";

e107::getAdminUI()->runPage();

require_once e_ADMIN . "footer.php";
exit;
