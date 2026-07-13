# Installation

1. Copy the `jmgooglead` directory into your e107 plugins directory.
2. In the e107 admin area, go to **Plugin Manager**.
3. Find **jmgooglead** in the list and install it.

Installation creates one database table, which holds your ad units. No existing data is
touched.

## After installing

Go to the plugin's **preferences** page and paste your AdSense snippet into the script
field. For most sites, that is all you need to do — see [Auto ads](../usage/auto-ads.md).

If you want to place ads yourself instead of letting Google do it, go on to
[Ad units](../usage/ad-units.md).

## If the help panel does not appear

e107 registers a plugin's add-on files when the plugin is installed. If a new add-on file
arrives with an upgrade of an already-installed plugin, e107 will not notice it on its
own.

Re-scan the plugin in **Plugin Manager** and the help panel will appear.

## Uninstalling

Uninstalling through the Plugin Manager leaves the ad units table in place by default.
e107 only drops it if you explicitly tick the option to delete tables. If you plan to
reinstall, leave that box unticked and your ad units will still be there.
