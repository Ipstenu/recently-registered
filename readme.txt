=== Recently Registered ===
Tags: users, recent, new, buddypress
Contributors: Ipstenu
Requires at least: 4.0
Tested up to: 4.3
Stable Tag: 3.4.2
Donate link: https://store.halfelf.org/donate/

Add a sortable column to the users list to show registration date.

== Description ==

This plugin adds a new, sortable, column to the users lists, which shows the date and time they registered.

Primarily useful for single site (which doesn't show this at all), on Multisite Networks it adds the user's registration info for all individual sites.

* [Donate](https://store.halfelf.org/donate/)
* [Plugin Site](http://halfelf.org/plugins/recently-registered/)

== Changelog ==

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

= 3.3 =
* 19 December 2014, by Ipstenu
* PHP Strict standards adhered to. Note, this had no bearing at all on the functionality of the plugin. It worked fine.

= 3.2.1 =
* 06 Nov, 2013 by Ipstenu
* Fixed regression introduced by get_date_from_gmt() being used wrong. (thanks <a href="http://wordpress.org/support/topic/every-user-registered-on-1-january-1970-0000">mayuxi</a>)

= 3.2 =
* 21 Oct, 2013 by Ipstenu
* Fixed localization and date_i18n()'ing (thanks, ssjaimia)

= 3.1 =
* 17 Jan, 2013 by Ipstenu
* Added in time to display (per request of <a href="http://wordpress.org/support/topic/show-timestamp">razorfrog</a>)

= 3.0 =
* 16 Jan, 2013 by Ipstenu
* Moving everything to it's own class.
* Changing priorities to stop other plugins from stomping on me.

= 2.3 =
* 17 June, 2012 by Ipstenu
* Per suggestion by Emanuel GómezMiranda, plugin uses your localized date!

= 2.2 =
* 17 April, 2012 by Ipstenu
* 3.4 okay, fixing URLs, readme formatting, donate links.

= 2.1 =
* 04 October, 2011 by Ipstenu
* Removing unused code
* Cleanup for 3.3
* Licensing clarifications.

= 2.0 =
* 09 March, 2011 by Ipstenu
* Rewrite the whole flippin thing.
* Removed Stop Forum Spam
* Removed need for extra page
* Made sortable (thank you, 3.1!)

= 1.3 =
* 12 July, 2010 by Ipstenu
* Cleanup of code, making it tighter etc.
* StopForum Spam check (which has been around for a while) is documented
* DO NOT use this on MultiSite

= 1.2 =
* 19 October, 2009 by Ipstenu
* Typo in function caused the plugin epic fail.

= 1.1 =
* 16 October, 2009 by Ipstenu
* Added in comment count to page.
* Added option to change recent number from 25 to whavever you want.

= 1.0 =
* 01 May, 2009 by Ipstenu
* Removed the since code (it wasn't working) and replaced with a short date.

= 0.2 =
* 30 March, 2009 by Ipstenu
* Moved to a sub-folder
* Formatting the list to be nicer.

= 0.1 =
* 27 March, 2009 by Ipstenu
* Initial version.

== Installation ==

No special instructions.

== Frequently Asked Questions ==

= Why is the field blank? =

Because some other plugins are _doing_it_wrong(). When they created their column, they forgot to have the filter return the previous content, if it's not their column, so it's removing it. Since my plugin's doing it right, I gave it a higher priority to stop that from happening in most cases.

= Can I change the date formatting? =

Not at this time. The code is hardcoded because so is WordPress and I wanted to keep it matching as much as possible. That means until WP changes how it formats that column, I'm not changing the plugin.

= Does this work on MultiSite? =

Yes it does. When Network Activated, it adds a column on each sub-site's user list to show registration date.

= Why doesn't it show registration time on Multisite? =

Because Multisite doesn't show that by default. If you set the request mode from list to excerpt, it'll show the time. It's a bit of a complicated way around it, but [this stackexchange thread explains it in detail](http://wordpress.stackexchange.com/questions/34956/set-default-listing-view-in-admin).

= Does this work on BuddyPress? =

Yes!

= Why doesn't this check for Stop Forum Spam anymore? =

Overlap.  After a lot of testing, I determined that [Ban Hammer](http://wordpress.org/plugins/ban-hammer/) does this better and cleaner.  So if you need that sort of thing, use the right tool.

= Why did you remove the separate page? =

Because it was redundant.  If you can sort it all on one page, why not do that?

== Screenshots ==

1. Sample output
