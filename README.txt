=== Analytics Event Tracking for GTAG ===
Contributors: thehowarde
Tags: Google Analytics, GTAG, Events, Analytics Events
Donate link: https://www.duckdiverllc.com
Requires at least: 4.5
Tested up to: 4.9
Requires PHP: 5.6
Stable tag: 1.1
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Adds a button to the WP Editor for easy insertion of links that can be tracked as Events in Google Analytics using the gtag.js code or Universal Analytics.

== Description ==

This plugin makes it easy to add Google Analytics Events [GTAG Events](https://developers.google.com/analytics/devguides/collection/gtagjs/events) for inbound or outbound links from your website.  Especially useful for click tracking or analyzing landing page interactions.

You can also choose via the settings page to use the analytics.js or Universal Analytics event tracking code.

This plugin will add a simple to use WP Editor Button for entry of link, link text, and the Analytics event information.

Within the WP Editor, the track-able links will be colored red instead of blue.

Also adds a lightweight frontend Javascript file to enable the tracking.

== Installation ==

1. Upload `gtag-event-tracking` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Do I have to use the TinyMCE button to add event tracking? =

No, you can simply add data-track="event" to trigger the event, and use data-category, data-label, and data-action to include those elements in the event.

= Does this track all click events? =

If you use the simple editor button, or add the data-event = "true" to any `<a>` tag, then it will track the event in Google Analytics.

= Does this only work with GTAG? =

There are options in the settings page of the plugin to choose Universal Analytics analytics.js

== Screenshots ==

1. WP TinyMCE Editor window with link builder.
2. Page with regular links and tracking links enabled.

== Changelog ==

== 1.1 ==

Add options page to include universtal analytics events

== 1.0 ==

Initial Build