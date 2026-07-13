<?php

/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* JM Google Ad - <head> loader output.
*
* Echoes the AdSense loader snippet into the page <head> when the position pref
* is 'head' (Google's recommended placement for verification). The snippet is
* emitted verbatim as raw HTML rather than routed through e107::js(), which
* would wrap it in a second <script> and cannot preserve the crossorigin
* attribute Google's official snippet uses.
*/

if(!defined('e107_INIT'))
{
	exit;
}

// e_meta.php is also read in the admin area; the AdSense script must never be
// injected there.
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

if($position === 'head')
{
	echo $jmgooglead->renderLoaderScript();
}
