# JM Google Ad — Google AdSense for e107

## Description

A small plugin for managing Google AdSense on an e107 site. It stores ad units
in the database, outputs them through a shortcode, and can load the AdSense
loader script site-wide.

## Requirements

- e107 Lite 2.4
- PHP 8

## Features

- Manage ad units (title, code, note, active flag, user-class visibility) from
  the admin panel.
- Place an ad anywhere with the shortcode `{JM_GOOGLE_AD: id=X}`.
- Optionally load the AdSense loader script on every page, in `<head>`
  (recommended for AdSense verification) or at the end of `<body>`
  (may score better in PageSpeed, but can break verification).
- Exclude specific pages from ads and the loader script.

## Usage

1. Install the plugin. The `jmgooglead` table is created on install.
2. Under **Preferences**, paste the AdSense loader snippet into *AdSense loader
   script*, enable *Load loader script site-wide*, and choose the *Loader script
   position*. The surrounding `<script>` tags are optional — they are added
   automatically if missing.
3. Add ad units on the main admin page, then place each one with
   `{JM_GOOGLE_AD: id=X}` (where `X` is the ad's ID).

## Security note

The ad code and loader script are stored and output verbatim (raw HTML/JS),
i.e. anyone who can edit them can inject arbitrary scripts into every page. For
that reason the entire admin area is restricted to the main administrator — there
is no plugin-level ("manage") access to any part of it.

## Disclaimer

No responsibility can be accepted for the failure of this plugin in any way,
shape or form. You use it entirely at your own risk.
