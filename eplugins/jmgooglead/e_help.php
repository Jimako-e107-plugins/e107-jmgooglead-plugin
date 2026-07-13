<?php

/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* JM Google Ad - admin help block.
*/

if(!defined('e107_INIT'))
{
	exit;
}

// [PLUGINS]/jmgooglead/languages/[LANGUAGE]/[LANGUAGE]_admin.php
// The folder is "jmgooglead" (no trailing "s"). On PHP 8 an undefined LAN
// constant is a fatal error, so this name must match the plugin directory.
e107::lan('jmgooglead', 'admin', true);

class jmgooglead_help
{
	private $action;

	public function __construct()
	{
		$this->action = varset($_GET['action'], '');
		$this->renderHelpBlock();
	}

	public function renderHelpBlock()
	{
		switch($this->action)
		{
			default:
				$block = $this->getHelpBlockListPage();
				break;
		}

		if(!empty($block))
		{
			e107::getRender()->tablerender($block['title'], $block['body']);
		}
	}

	public function getHelpBlockListPage()
	{
		$content = '';
		$content .= '<p>' . LAN_JMGOOGLEAD_ADMIN_HELP_02 . '</p>';

		$block = array(
			'title' => LAN_JMGOOGLEAD_ADMIN_HELP_01,
			'body'  => $content,
		);

		return $block;
	}
}

new jmgooglead_help();
