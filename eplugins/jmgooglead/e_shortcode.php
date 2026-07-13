<?php

/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* JM Google Ad - site-wide shortcodes.
*
* Provides {JM_GOOGLE_AD: id=xxx}. All logic is delegated to the shared
* jmgooglead class so this batch stays a thin adapter.
*/

if(!defined('e107_INIT'))
{
	exit;
}

class jmgooglead_shortcodes extends e_shortcode
{
	/**
	 * {JM_GOOGLE_AD: id=xxx} - output one ad unit by id.
	 *
	 * $parm arrives as a raw string (e.g. "id=5"), not an array, so it is parsed
	 * with eHelper::scParams() before the id is read and cast to int.
	 *
	 * @param string $parm
	 * @return string
	 */
	public function sc_jm_google_ad($parm = '')
	{
		$parm = eHelper::scParams($parm);
		$id = isset($parm['id']) ? (int) $parm['id'] : 0;

		if($id < 1)
		{
			return '';
		}

		$jmgooglead = e107::getSingleton('jmgooglead', e_PLUGIN . 'jmgooglead/includes/jmgooglead.php');

		return $jmgooglead->renderAd($id);
	}
}
