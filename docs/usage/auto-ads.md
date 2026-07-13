# Auto ads

With auto ads, you paste one snippet and Google does the rest. It scans your pages and
decides where the ads go. You do not create any ad units, and you do not put anything into
your templates.

**For most sites, this is all you need.**

## Setting it up

1. In AdSense, copy your code snippet. It looks like this:

    ```html
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0000000000000000" crossorigin="anonymous"></script>
    ```

2. In the plugin's **preferences**, paste it into the script field.
3. Turn the script on.
4. Save.

That is it. The plugin now outputs the snippet on every page of your site.

{% hint style="info" %}
Paste the snippet exactly as Google gives it to you, including the `<script>` tags. The
plugin stores it verbatim. You do not need to change any of e107's content filter
settings.
{% endhint %}

## Where the script goes: `head` or `body_end`

The **position** preference controls where the snippet is written into the page.

| Setting     | Where                        |
| ----------- | ---------------------------- |
| `head`      | Inside `<head>`              |
| `body_end`  | Just before `</body>`        |

**This is a trade-off, and it is worth understanding before you change it.**

* `head` is where Google expects the snippet. If you are still waiting for AdSense to
  verify your site, use `head`.
* `body_end` can score better in Google PageSpeed, because the browser is not held up
  loading a third-party script before it renders the page. But moving the snippet out of
  `<head>` **can break AdSense verification.**

The default is `head`. If your site is already verified and you are chasing a PageSpeed
score, try `body_end` — but check afterwards that AdSense still reports your site as
active.

## Ads are never shown in the admin area

The snippet is only ever written into front-end pages. It is never injected into the e107
admin area.
