---
title: 'New plugin: VPM Custom Admin for branded WordPress'
author: Chris Van Patten
layout: post
permalink: /2012/new-plugin-vpm-custom-admin-for-branded-wordpress/
dsq_thread_id:
  - 631969375
---
# 

[![][2]][2]Have you ever wanted to customize the WordPress admin panel so your clients see a custom look specific to you and your business? It’s actually super easy, and with our new plugin, **[VPM Custom Admin][2]**, we’ve made it even easier.

 []: http://labs.vanpattenmedia.com/wp-content/uploads/2012/02/35mm-The-Musical-›-Log-In.png
 [2]: https://github.com/vanpattenmedia/vpm-custom-admin

**VPM Custom Admin** is a simple plugin that helps designers and developers white-label WordPress quickly and easily. It has a few cool features included by default.

Check out those features after the jump…

*   Replace the WordPress logo on the login page with your own custom logo
*   Remove the WordPress menu in the admin menubar
*   Add your link and logo to the WordPress footer (we also move the Credits and Freedoms links there, in the interest of being good citizens)
*   Remove a bunch of widgets from the dashboard
*   Add a custom RSS widget pointing to your blog or website RSS feed to the dashboard

It also has the abillity to auto-update from a custom update endpoint. *What the heck does that mean? *Well, you probably won’t want to submit your customized version of this plugin to the WordPress Plugins Directory (who else would want it?) but auto-updating functionality is super useful, especially if you have a lot of clients. We solve that problem by looking for updates at a location you define. We set up **https://updates.vanpattenmedia.com/**, but you’ll want to change that. The information [available here][3] is a good reference on how to set up your custom update endpoint (it’s very easy).

 [3]: https://github.com/jeremyclark13/automatic-theme-plugin-update

For maximum freedom, we’ve licensed this plugin under the [Unlicense][4], effectively releasing it into the public domain. That doesn’t apply to our custom CSS and the images and RSS the plugin references (but why would you want those anyway?).

 [4]: http://unlicense.org/

As with all our other open source projects, you can [find the plugin at Github][2]. We welcome your bug reports, pull requests, and comments!