<?php

/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* JM Google Ad - shared admin dispatcher and left menu.
*
* Included by both admin entry files (admin_config.php = preferences,
* admin_adunits.php = ad-unit CRUD). The base dispatcher holds the shared menu,
* the main-admin-only permission and the title; each entry file instantiates a
* thin subclass that pins its own default mode/action so that a bare hit on
* either file (e.g. from the plugin admin links) lands on that file's own
* controller.
*
* The language pack is loaded here, at the very top, BEFORE any dispatcher class
* is defined: class property defaults reference LAN_* constants at parse time,
* so those constants must already exist.
*/

if(!defined('e107_INIT'))
{
	exit;
}

e107::lan('jmgooglead', 'admin', true);

/**
 * Shared base: menu, permissions and title common to both admin pages.
 *
 * The whole plugin is main-admin-only. It stores and outputs raw third-party
 * HTML/JS (googlead_code, googleads_script) verbatim, so there is no safe
 * read-only subset to expose to a plugin-level admin. The string form of $perm
 * is enforced by hasModeAccess() for every route in the dispatcher.
 *
 * Menu links carry an explicit 'url': processMenuItem() turns each route key
 * into "<url>?mode=&action=" so items navigate between the two files with the
 * right mode/action and the active item stays highlighted.
 */
class jmgooglead_adminArea extends e_admin_dispatcher
{
	protected $perm = '0';

	protected $adminMenu = array(

		'adunits/list'   => array('caption' => LAN_JMGOOGLEAD_ADMIN_ADUNITS,    'url' => '{e_PLUGIN}jmgooglead/admin/admin_adunits.php'),
		'adunits/create' => array('caption' => LAN_JMGOOGLEAD_ADMIN_ADUNIT_NEW, 'url' => '{e_PLUGIN}jmgooglead/admin/admin_adunits.php'),
		'prefs/prefs'    => array('caption' => LAN_PREFS,                       'url' => '{e_PLUGIN}jmgooglead/admin/admin_config.php'),

	);

	protected $adminMenuAliases = array(
		'adunits/edit' => 'adunits/list',
	);

	protected $menuTitle = LAN_JMGOOGLEAD_ADMIN_01;
}

/**
 * Ad-unit dispatcher: entry point admin_adunits.php. Knows only the 'adunits'
 * mode; its controller is defined in that file.
 */
class jmgooglead_adunits_dispatcher extends jmgooglead_adminArea
{
	protected $defaultMode   = 'adunits';
	protected $defaultAction = 'list';

	protected $modes = array(
		'adunits' => array(
			'controller' => 'jmgooglead_adunits_ui',
			'path'       => null,
			'ui'         => 'jmgooglead_adunits_form_ui',
			'uipath'     => null,
		),
	);
}

/**
 * Preferences dispatcher: entry point admin_config.php. Knows only the 'prefs'
 * mode; its controller is defined in that file.
 */
class jmgooglead_prefs_dispatcher extends jmgooglead_adminArea
{
	protected $defaultMode   = 'prefs';
	protected $defaultAction = 'prefs';

	protected $modes = array(
		'prefs' => array(
			'controller' => 'jmgooglead_prefs_ui',
			'path'       => null,
			'ui'         => 'jmgooglead_prefs_form_ui',
			'uipath'     => null,
		),
	);
}
