# Excluding pages

You may not want ads everywhere. A donation page, a legal notice, a page that Google's
policies do not allow ads on — you can keep ads off any of them.

In the plugin's **preferences**, use the excluded pages field. Enter **one page per
line**.

A page is excluded when its address contains the text you entered, so you can be as broad
or as narrow as you need:

```
/donate
/rules.php
/contact
```

Anything matching is skipped: both the auto ads script and any ad unit shortcodes on that
page produce nothing.

{% hint style="warning" %}
**Do not leave blank lines in this field.** In earlier versions, a single empty line
matched every page and switched ads off across the whole site. This is fixed, but there is
no reason to leave stray blank lines lying around — keep the list clean.
{% endhint %}
