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
	'LAN_JMGOOGLEAD_ADMIN_ADUNITS'    => "Reklamní jednotky",
	'LAN_JMGOOGLEAD_ADMIN_ADUNIT_NEW' => "Nová reklamní jednotka",

	// Ad-unit fields
	'LAN_JMGOOGLEAD_ADMIN_GAID'         => "ID reklamy",
	'LAN_JMGOOGLEAD_ADMIN_GAID_HELP'    => "Volitelné referenční pole pro vaše AdSense publisher/slot ID (např. ca-pub-XXXXXXXX). Nepoužívá se při výstupu.",
	'LAN_JMGOOGLEAD_ADMIN_CODE'         => "Kód reklamy",
	'LAN_JMGOOGLEAD_ADMIN_CODE_HELP'    => "Kód reklamní jednotky z AdSense, s načítacím &lt;script&gt; nebo bez něj (viz předvolby). Vypíše se doslovně.",
	'LAN_JMGOOGLEAD_ADMIN_NOTE_HELP'    => "Soukromá poznámka pro vaši potřebu. Na webu se nezobrazuje.",
	'LAN_JMGOOGLEAD_ADMIN_ACTIVE_HELP'  => "Neaktivní reklamy zůstanou uložené, ale nezobrazují se.",
	'LAN_JMGOOGLEAD_ADMIN_CLASS_HELP'   => "Která uživatelská třída uvidí tuto reklamu. Tip: obvykle ne hlavní administrátor.",

	// Preferences
	'LAN_JMGOOGLEAD_ADMIN_SCRIPT'          => "Načítací skript AdSense",
	'LAN_JMGOOGLEAD_ADMIN_SCRIPT_HELP'     => "Vložte načítací úryvek kódu AdSense od Googlu. Okolní značky &lt;script&gt; jsou volitelné - pokud chybí, přidají se automaticky.",
	'LAN_JMGOOGLEAD_ADMIN_GLOBAL'          => "Načítat skript na celém webu",
	'LAN_JMGOOGLEAD_ADMIN_GLOBAL_HELP'     => "Vypíše načítací skript na každé stránce. Pokud je vypnuto, vložte načítací skript přímo do kódu každé reklamy.",
	'LAN_JMGOOGLEAD_ADMIN_POSITION'        => "Pozice načítacího skriptu",
	'LAN_JMGOOGLEAD_ADMIN_POSITION_HEAD'   => "V &lt;head&gt; (doporučeno)",
	'LAN_JMGOOGLEAD_ADMIN_POSITION_BODY'   => "Na konci &lt;body&gt;",
	'LAN_JMGOOGLEAD_ADMIN_POSITION_HELP'   => "Kam vypsat načítací skript. \"head\" je to, co Google očekává při ověření AdSense. \"body_end\" může dosahovat lepší skóre v PageSpeed, ale může narušit ověření.",
	'LAN_JMGOOGLEAD_ADMIN_BLOCKPAGES'      => "Vyloučit stránky",
	'LAN_JMGOOGLEAD_ADMIN_BLOCKPAGES_HELP' => "Stránky, na kterých se reklamy a načítací skript potlačí. Jeden fragment URL na řádek.",

	// Help block (e_help.php addon - support/documentation links)
	'LAN_JMGOOGLEAD_ADMIN_HELP_01' => "Nápověda",
	'LAN_JMGOOGLEAD_ADMIN_HELP_02' => "Reklamní jednotky přidejte v sekci Reklamní jednotky a potom každou vložte pomocí shortcode {JM_GOOGLE_AD: id=X}. Načítací skript AdSense nastavte v sekci Předvolby.",

	// Sidebar help (renderHelp() on each controller). Braces in the shortcode
	// example are HTML entities (&#123;/&#125;) so it is displayed literally and
	// never parsed as a real shortcode.
	'LAN_JMGOOGLEAD_ADMIN_PREFS_HELP'   => "Výše vložte načítací skript AdSense a zapněte <em>Načítat skript na celém webu</em> - to samo o sobě stačí pro začátek. Při Google Auto Ads potom Google umísťuje reklamy za vás automaticky, takže nemusíte vytvářet žádné reklamní jednotky. Reklamní jednotky vytvářejte pouze tehdy, když chcete umístění řídit sami.<br /><br />Pozice skriptu: <em>head</em> je to, co Google očekává při ověření AdSense; <em>body_end</em> může dosahovat lepší skóre v PageSpeed, ale může narušit ověření.",
	'LAN_JMGOOGLEAD_ADMIN_ADUNITS_HELP' => "Každá reklamní jednotka se na web vkládá pomocí shortcode, který odkazuje na její ID (číslo ve sloupci ID). Pro reklamní jednotku s ID 1 vložte:<br /><br /><code>&#123;JM_GOOGLE_AD: id=1&#125;</code><br /><br />Shortcode je dostupný na celém webu, takže jej můžete použít v šablonách motivu, vlastních stránkách a menu.",
];
