<?php

/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* Admin language constants for the JM Google Ad plugin.
*/

return [
	'LAN_JMGOOGLEAD_ADMIN_01' => "JM Google Ad",

	// Ad-unit section
	'LAN_JMGOOGLEAD_ADMIN_ADUNITS'    => "Ad units",
	'LAN_JMGOOGLEAD_ADMIN_ADUNIT_NEW' => "New ad unit",

	// Ad-unit fields
	'LAN_JMGOOGLEAD_ADMIN_GAID'         => "Ad ID",
	'LAN_JMGOOGLEAD_ADMIN_GAID_HELP'    => "Optional reference field for your AdSense publisher/slot ID (e.g. ca-pub-XXXXXXXX). Not used for output.",
	'LAN_JMGOOGLEAD_ADMIN_CODE'         => "Ad code",
	'LAN_JMGOOGLEAD_ADMIN_CODE_HELP'    => "The ad unit code from AdSense, with or without the loader &lt;script&gt; (see preferences). Output verbatim.",
	'LAN_JMGOOGLEAD_ADMIN_NOTE_HELP'    => "Private note for your own reference. Not shown on the site.",
	'LAN_JMGOOGLEAD_ADMIN_ACTIVE_HELP'  => "Inactive ads are kept but not displayed.",
	'LAN_JMGOOGLEAD_ADMIN_CLASS_HELP'   => "Which user class may see this ad. Tip: usually not the main admin.",

	// Preferences
	'LAN_JMGOOGLEAD_ADMIN_SCRIPT'          => "AdSense loader script",
	'LAN_JMGOOGLEAD_ADMIN_SCRIPT_HELP'     => "Paste the AdSense loader snippet from Google. The surrounding &lt;script&gt; tags are optional - they are added automatically if missing.",
	'LAN_JMGOOGLEAD_ADMIN_GLOBAL'          => "Load loader script site-wide",
	'LAN_JMGOOGLEAD_ADMIN_GLOBAL_HELP'     => "Output the loader script on every page. If off, include the loader inside each ad's code instead.",
	'LAN_JMGOOGLEAD_ADMIN_POSITION'        => "Loader script position",
	'LAN_JMGOOGLEAD_ADMIN_POSITION_HEAD'   => "In &lt;head&gt; (recommended)",
	'LAN_JMGOOGLEAD_ADMIN_POSITION_BODY'   => "End of &lt;body&gt;",
	'LAN_JMGOOGLEAD_ADMIN_POSITION_HELP'   => "Where to output the loader script. \"head\" is what Google expects for AdSense verification. \"body_end\" may score better in PageSpeed but can break verification.",
	'LAN_JMGOOGLEAD_ADMIN_BLOCKPAGES'      => "Exclude pages",
	'LAN_JMGOOGLEAD_ADMIN_BLOCKPAGES_HELP' => "Pages on which ads and the loader are suppressed. One URL fragment per line. Warning: each entry is matched against the full page URL including the domain, so a fragment of your own domain name would match every page and disable ads site-wide - enter a path fragment (e.g. /donate), not the domain.",

	// Help block (e_help.php addon - support/documentation links)
	'LAN_JMGOOGLEAD_ADMIN_HELP_01' => "Help",
	'LAN_JMGOOGLEAD_ADMIN_HELP_02' => "Add ad units under Ad units, then place each one with the shortcode {JM_GOOGLE_AD: id=X}. Configure the AdSense loader script under Preferences.",

	// Sidebar help (renderHelp() on each controller). Braces in the shortcode
	// example are HTML entities (&#123;/&#125;) so it is displayed literally and
	// never parsed as a real shortcode.
	'LAN_JMGOOGLEAD_ADMIN_PREFS_HELP'   => "Paste your AdSense loader script above and switch on <em>Load loader script site-wide</em> - that alone is enough to start. With Google Auto Ads, Google then places the ads for you automatically, so you do not need to create any ad units. Create ad units only when you want to control placement yourself.<br /><br />Loader position: <em>head</em> is what Google expects for AdSense verification; <em>body_end</em> may score better in PageSpeed but can break verification.",
	'LAN_JMGOOGLEAD_ADMIN_ADUNITS_HELP' => "Each ad unit is placed on the site with a shortcode that references its ID (the number in the ID column). For the ad unit with ID 1, insert:<br /><br /><code>&#123;JM_GOOGLE_AD: id=1&#125;</code><br /><br />The shortcode is available site-wide, so you can use it in theme templates, custom pages and menus.",
];
