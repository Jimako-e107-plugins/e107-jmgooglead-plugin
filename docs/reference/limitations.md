# Limitations

Things the plugin does not do, and known rough edges. Better to find them here than after
an afternoon of debugging.

## No validation of your AdSense code

Whatever you paste is stored and output as-is. If the snippet is wrong, truncated, or from
the wrong account, the plugin will not tell you — it will faithfully put the broken code on
your site. Check it against your AdSense dashboard.

A future version may store the publisher ID separately and validate it. Today it does not.

## No `ads.txt` handling

`ads.txt` is a separate requirement from Google. It is a plain file in your site's root
directory, and this plugin neither creates it nor checks it. Having `ads.txt` in place does
not remove the need for the AdSense script, and the script does not remove the need for
`ads.txt`.

## The position setting is a real trade-off

Moving the script to `body_end` may improve PageSpeed and may break AdSense verification.
The plugin cannot warn you which will happen on your site. If verification matters more
than the score, leave it on `head`.

## Excluded pages match on substring

A page is excluded when its address *contains* the text you entered. There is no pattern
matching and no wildcards. Short entries can match more pages than you intended — `/ru`
would also match `/rules.php`. Be specific.

## No statistics

The plugin inserts ad code. It does not count impressions, clicks or revenue. All of that
lives in your AdSense dashboard.

## Ad blockers

Nothing here defeats an ad blocker, and the plugin does not try to detect one. An earlier
version had an ad-blocker check bolted on; it depended on a third-party service that no
longer exists and has been removed.
