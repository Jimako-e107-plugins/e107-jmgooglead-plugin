# Requirements

* **e107 2.4** or newer.
* **PHP 8** or newer.
* A **Google AdSense account** with your site added and approved.

## What you need from Google

Everything the plugin needs comes from your AdSense dashboard.

**For auto ads**, you need the AdSense code snippet. It looks like this:

```html
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0000000000000000" crossorigin="anonymous"></script>
```

**For individual ad units**, you additionally need the code for each unit you create in
AdSense. That code is a small block of HTML and JavaScript that you copy out of the
AdSense interface.

The plugin stores whatever you paste, exactly as you paste it. You never have to pick the
snippet apart or extract the publisher ID by hand.

## ads.txt

`ads.txt` is a separate requirement from Google and is **not** handled by this plugin. It
is a plain text file in your site's root directory. Having it in place is not a substitute
for the AdSense script — Google expects both.
