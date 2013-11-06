=== Recently Registered ===
Tags: users, recent, new, buddypress
Contributors: Ipstenu
Requires at least: 3.1
Tested up to: 3.7
Stable Tag: 3.2.1
Donate link: https://www.wepay.com/donations/halfelf-wp/

Add a sortable column to the users list on Single Site WordPress to show registration date.

== Description ==

This plugin adds a new, sortable, column to the users lists, which shows the date they registered.  This works just like it does on WordPress MultiSite, only for Single Site!

* [Donate](https://www.wepay.com/donations/halfelf-wp)
* [Plugin Site](http://halfelf.org/plugins/recently-registered/)

== Changelog ==

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

= Will this work on older versions of WordPress? =

Not anymore.  This ONLY works on WordPress 3.1 and up.

= Does this work on MultiSite? =

No, and you don't need it! This is built in to Multisite.

= Does this work on BuddyPress? =

Yes!

= Why doesn't this check for Stop Forum Spam anymore? =

Overlap.  After a lot of testing, I determiend that [Ban Hammer](http://wordpress.org/extend/plugins/ban-hammer/) does this better and cleaner.  So if you need that sort of thing, use the right tool.

= Why did you remove the separate page? =

Becuase it was redundant.  If you can sort it all on one page, why not do that?

== Screenshots ==

1. Sample output
