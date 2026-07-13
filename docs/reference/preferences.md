# Preferences

The preferences page holds the settings that apply to the whole site. Individual ads are
configured separately, under [Ad units](../usage/ad-units.md).

| Preference      | Type      | What it does                                                                 |
| --------------- | --------- | ---------------------------------------------------------------------------- |
| Script          | Text      | The AdSense snippet, pasted from Google. Stored exactly as entered.           |
| Enable script   | Yes / No  | Whether the snippet is written into your pages at all.                        |
| Position        | Choice    | `head` or `body_end`. See below.                                              |
| Excluded pages  | Text      | Pages where no ads appear. One per line. See [Excluding pages](../usage/excluding-pages.md). |

## Script

Paste the snippet exactly as AdSense gives it to you, `<script>` tags and all:

```html
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0000000000000000" crossorigin="anonymous"></script>
```

The plugin stores it verbatim — nothing is stripped, rewritten or re-encoded. You do not
need to touch e107's content filter settings, and you do not need to extract the publisher
ID.

This one setting is enough for [auto ads](../usage/auto-ads.md) on its own.

## Enable script

Turns the snippet off without deleting it. Useful while testing, or if you need to pull
ads temporarily.

This does **not** affect ad units — those have their own *Active* switch.

## Position

Where the snippet is written into the page.

* **`head`** — inside `<head>`. This is what Google expects, and what AdSense
  verification looks for. **Default.**
* **`body_end`** — just before `</body>`. Can improve your PageSpeed score, because the
  browser does not wait on a third-party script before rendering. **May break AdSense
  verification.**

If your site is not yet verified, leave this on `head`.

## Excluded pages

One page per line. A page is excluded if its address contains the text you entered. Both
the script and any ad unit shortcodes are suppressed on a matching page.

Do not leave blank lines in this field.
