<?php

/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* JM Google Ad - end-of-body loader output.
*
* Echoes the AdSense loader snippet just before </body> when the position pref
* is 'body_end'. This can score better in PageSpeed but may break AdSense
* verification, so 'head' (see e_meta.php) remains the default. Emitted verbatim
* as raw HTML for the same reasons documented in e_meta.php.
*/

if(!defined('e107_INIT'))
{
	exit;
}

if(!USER_AREA)
{
	return;
}

$jmgooglead = e107::getSingleton('jmgooglead', e_PLUGIN . 'jmgooglead/includes/jmgooglead.php');

if($jmgooglead->isPageBlocked())
{
	return;
}

$position = e107::getPlugPref('jmgooglead', 'googleads_position', 'head');

if($position === 'body_end')
{
	echo $jmgooglead->renderLoaderScript();
}
