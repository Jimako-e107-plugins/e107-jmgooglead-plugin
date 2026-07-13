# jmgooglead

An e107 plugin for adding Google AdSense to your site.

It does two things:

* **Loads the AdSense script** on every page, which is all that is needed for
  [Auto ads](usage/auto-ads.md) — Google then decides where the ads go.
* **Manages individual ad units**, if you would rather place ads yourself. Each unit is
  inserted with a [shortcode](usage/ad-units.md).

You can use either, or both.

## At a glance

|                    |                                                       |
| ------------------ | ----------------------------------------------------- |
| Requires           | e107 2.4, PHP 8                                        |
| Admin access       | Main administrator only — see [Permissions](reference/permissions.md) |
| Script position    | `<head>` or before `</body>`, configurable             |
| Ad unit insertion  | Shortcode                                              |

{% hint style="warning" %}
This plugin stores and outputs raw third-party HTML and JavaScript exactly as you enter
it, with no filtering. That is what makes it work — and it is why the admin area is
restricted to the main administrator. Read [Permissions](reference/permissions.md)
before granting anyone access.
{% endhint %}
