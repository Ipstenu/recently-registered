=== Recently Registered ===
Tags: users, recent, new, buddypress, multisite
Contributors: Ipstenu
Requires at least: 4.0
Tested up to: 5.1
Stable Tag: 3.4.3
Donate link: https://ko-fi.com/A236CEN/

Add a sortable column to the users list to show registration date.

== Description ==

This plugin adds a new, sortable, column to the users lists, which shows the date and time they registered.

Primarily useful for single site (which doesn't show this at all), on Multisite Networks it adds the user's registration info for all individual sites.

* [Donate](https://ko-fi.com/A236CEN/)
* [Plugin Site](http://halfelf.org/plugins/recently-registered/)

=== Privacy Notes ===

This plugin does not track any additional data other than what WordPress natively collects upon registration. It just makes the data visble.

== Installation ==

No special instructions.

== Frequently Asked Questions ==

= Why is the field blank? =

Because some other plugins are `_doing_it_wrong()`. When they created their column, they forgot to have the filter return the previous content, if it's not their column, so it's removing it. Since my plugin's doing it right, I gave it a higher priority to stop that from happening in most cases.

= Can I change the date formatting? =

Not at this time. The code is hardcoded because so is WordPress and I wanted to keep it matching as much as possible. That means until WP changes how it formats that column, I'm not changing the plugin.

= Does this work on MultiSite? =

Yes it does. When Network Activated, it adds a column on each sub-site's user list to show registration date.

= Why doesn't it show registration time on Multisite? =

Because Multisite doesn't show that by default. If you set the request mode from list to excerpt, it'll show the time. It's a bit of a complicated way around it, but [this stackexchange thread explains it in detail](http://wordpress.stackexchange.com/questions/34956/set-default-listing-view-in-admin).

= Does this work on BuddyPress? =

Yes!

= Why doesn't this check for Stop Forum Spam anymore? =

Overlap. After a lot of testing, I determined that [Ban Hammer](http://wordpress.org/plugins/ban-hammer/) does this better and cleaner. So if you need that sort of thing, use the right tool.

= Why did you remove the separate page? =

Because it was redundant.  If you can sort it all on one page, why not do that?

== Screenshots ==

1. Sample output

== Changelog ==

= 3.4.3 = 
* 11 January 2016, by Ipstenu
* Public functions, what's your function? (This is not a functional change, just a cleanup)

= 3.4.2 = 
* 16 September 2015, by Ipstenu
* Fixing errant `.=` from renaming functions. (hattip sintro)

= 3.4.1 =
* 05 May 2015, by Ipstenu
* Typo preventing activation on singlesite *SIGH*

= 3.4 =
* 05 May 2015, by Ipstenu
* Now works for Multisite so you can see the registrations per-site
* Changed formatting to match Multisite's display
* Network only if on Multisite (I think only the super-admins should decide this one)
