# Permissions

**The entire plugin admin area is restricted to the main administrator.** Other
administrators — even those who can manage plugins — cannot open it.

This is deliberate, and it is worth understanding why.

## Why

The plugin stores raw HTML and JavaScript and writes it into your pages **exactly as
entered, with no filtering whatsoever**. That is not an oversight; it is the only way to
store Google's snippet intact. AdSense code contains `<script>` tags and attributes that
e107's content filter would otherwise strip out, which would leave you with code that
looks right in the admin but silently does not work.

The consequence is that anyone who can edit these fields can run arbitrary JavaScript on
every page of your site, for every visitor. That is not a permission to hand out casually.

Restricting the plugin to the main administrator is what makes storing unfiltered code an
acceptable trade rather than a hole.

## What this means in practice

* Only the main administrator can add, edit or delete ad units.
* Only the main administrator can change the preferences.
* Other administrators do not see the plugin in their admin menu, and cannot reach it by
  typing the address directly.

## Do not work around it

If you find yourself wanting to grant a second administrator access, be clear about what
you are granting: the ability to inject any JavaScript, anywhere on the site. There is no
partial version of this permission — reading the ad code and writing it are the same
capability, because the code *is* the content.

If you genuinely need to delegate ad management, the safer answer is to give that person
the AdSense account access and have the main administrator paste the resulting code.
