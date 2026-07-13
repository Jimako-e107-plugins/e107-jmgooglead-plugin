# Ad units

An **ad unit** is a single ad in a place you choose. Use ad units when you want to control
where ads appear, instead of leaving it to [auto ads](auto-ads.md).

You can have as many as you like — that is why they live in a table rather than in the
preferences.

## Creating an ad unit

1. In AdSense, create the ad unit and copy its code.
2. In the plugin's admin area, open **Ad units** and create a new one.
3. Fill in:

| Field       | What it is                                                              |
| ----------- | ----------------------------------------------------------------------- |
| Name        | A label for you. It is not shown to visitors.                            |
| Code        | The ad unit's code, pasted from AdSense exactly as given.                |
| Note        | Free text for your own reference — where you used it, what it is for.    |
| Active      | Turn the unit on or off without deleting it.                             |
| Visible to  | Which user class sees this ad. See below.                                |

4. Save. The list now shows the unit's **ID**. You need that ID to place it.

## Placing an ad unit

Insert the unit with a shortcode, using its ID:

```
{JM_GOOGLE_AD: id=1}
```

Replace `1` with the ID from the list. You can use this anywhere e107 shortcodes are
parsed — theme templates, custom pages, and menus.

See [Shortcodes](../reference/shortcodes.md) for the details.

## Hiding ads from some visitors

The **Visible to** field is a standard e107 user class. A common use is to hide ads from
members while still showing them to guests — set the ad's user class to *Guest*, or to
whichever class you want to target.

Visitors outside that class simply get nothing where the shortcode is: no empty box, no
gap.

## Auto ads and ad units together

You can use both. The auto ads snippet in the preferences and your ad units are
independent of each other, and neither one requires the other.
