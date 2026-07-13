# Shortcodes

The plugin registers one shortcode.

## `JM_GOOGLE_AD`

Outputs a single [ad unit](../usage/ad-units.md).

```
{JM_GOOGLE_AD: id=1}
```

| Parameter | Required | Description                                                     |
| --------- | -------- | --------------------------------------------------------------- |
| `id`      | Yes      | The ad unit's ID, as shown in the Ad units list in the admin.    |

The shortcode is registered site-wide, so it works anywhere e107 parses shortcodes —
theme templates, custom pages and menus.

## When it outputs nothing

The shortcode produces an empty string, with no markup and no gap in the layout, when:

* No ad unit with that ID exists.
* The ad unit is not **Active**.
* The visitor is not in the ad unit's user class.
* The current page is in the [excluded pages](../usage/excluding-pages.md) list.

This is deliberate. A visitor who is not supposed to see an ad sees nothing at all, rather
than an empty placeholder.

## Auto ads do not use a shortcode

If you only want [auto ads](../usage/auto-ads.md), you do not need this shortcode
anywhere. The script is inserted automatically on every page.
