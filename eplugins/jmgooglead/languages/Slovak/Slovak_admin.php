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
	'LAN_JMGOOGLEAD_ADMIN_ADUNITS'    => "Reklamné jednotky",
	'LAN_JMGOOGLEAD_ADMIN_ADUNIT_NEW' => "Nová reklamná jednotka",

	// Ad-unit fields
	'LAN_JMGOOGLEAD_ADMIN_GAID'         => "ID reklamy",
	'LAN_JMGOOGLEAD_ADMIN_GAID_HELP'    => "Voliteľné referenčné pole pre vaše AdSense publisher/slot ID (napr. ca-pub-XXXXXXXX). Nepoužíva sa pri výstupe.",
	'LAN_JMGOOGLEAD_ADMIN_CODE'         => "Kód reklamy",
	'LAN_JMGOOGLEAD_ADMIN_CODE_HELP'    => "Kód reklamnej jednotky z AdSense, s načítavacím &lt;script&gt; alebo bez neho (pozri nastavenia). Vypíše sa doslovne.",
	'LAN_JMGOOGLEAD_ADMIN_NOTE_HELP'    => "Súkromná poznámka pre vašu potrebu. Na stránke sa nezobrazuje.",
	'LAN_JMGOOGLEAD_ADMIN_ACTIVE_HELP'  => "Neaktívne reklamy zostanú uložené, ale nezobrazujú sa.",
	'LAN_JMGOOGLEAD_ADMIN_CLASS_HELP'   => "Ktorá používateľská trieda uvidí túto reklamu. Tip: zvyčajne nie hlavný administrátor.",

	// Preferences
	'LAN_JMGOOGLEAD_ADMIN_SCRIPT'          => "Načítavací skript AdSense",
	'LAN_JMGOOGLEAD_ADMIN_SCRIPT_HELP'     => "Vložte načítavací úryvok kódu AdSense od Google. Okolité značky &lt;script&gt; sú voliteľné - ak chýbajú, pridajú sa automaticky.",
	'LAN_JMGOOGLEAD_ADMIN_GLOBAL'          => "Načítať skript na celom webe",
	'LAN_JMGOOGLEAD_ADMIN_GLOBAL_HELP'     => "Vypíše načítavací skript na každej stránke. Ak je vypnuté, vložte načítavací skript priamo do kódu každej reklamy.",
	'LAN_JMGOOGLEAD_ADMIN_POSITION'        => "Pozícia načítavacieho skriptu",
	'LAN_JMGOOGLEAD_ADMIN_POSITION_HEAD'   => "V &lt;head&gt; (odporúčané)",
	'LAN_JMGOOGLEAD_ADMIN_POSITION_BODY'   => "Na konci &lt;body&gt;",
	'LAN_JMGOOGLEAD_ADMIN_POSITION_HELP'   => "Kam vypísať načítavací skript. \"head\" je to, čo Google očakáva pri overení AdSense. \"body_end\" môže dosahovať lepšie skóre v PageSpeed, ale môže narušiť overenie.",
	'LAN_JMGOOGLEAD_ADMIN_BLOCKPAGES'      => "Vylúčiť stránky",
	'LAN_JMGOOGLEAD_ADMIN_BLOCKPAGES_HELP' => "Stránky, na ktorých sa reklamy a načítavací skript potlačia. Jeden fragment URL na riadok.",

	// Help block (e_help.php addon - support/documentation links)
	'LAN_JMGOOGLEAD_ADMIN_HELP_01' => "Nápoveda",
	'LAN_JMGOOGLEAD_ADMIN_HELP_02' => "Reklamné jednotky pridajte v sekcii Reklamné jednotky a potom každú vložte pomocou shortcode {JM_GOOGLE_AD: id=X}. Načítavací skript AdSense nastavte v sekcii Nastavenia.",

	// Sidebar help (renderHelp() on each controller). Braces in the shortcode
	// example are HTML entities (&#123;/&#125;) so it is displayed literally and
	// never parsed as a real shortcode.
	'LAN_JMGOOGLEAD_ADMIN_PREFS_HELP'   => "Vyššie vložte načítavací skript AdSense a zapnite <em>Načítať skript na celom webe</em> - to samo o sebe stačí na začiatok. Pri Google Auto Ads potom Google umiestňuje reklamy za vás automaticky, takže nemusíte vytvárať žiadne reklamné jednotky. Reklamné jednotky vytvárajte iba vtedy, keď chcete umiestnenie riadiť sami.<br /><br />Pozícia skriptu: <em>head</em> je to, čo Google očakáva pri overení AdSense; <em>body_end</em> môže dosahovať lepšie skóre v PageSpeed, ale môže narušiť overenie.",
	'LAN_JMGOOGLEAD_ADMIN_ADUNITS_HELP' => "Každá reklamná jednotka sa na web vkladá pomocou shortcode, ktorý odkazuje na jej ID (číslo v stĺpci ID). Pre reklamnú jednotku s ID 1 vložte:<br /><br /><code>&#123;JM_GOOGLE_AD: id=1&#125;</code><br /><br />Shortcode je dostupný na celom webe, takže ho môžete použiť v šablónach témy, vlastných stránkach a menu.",
];
