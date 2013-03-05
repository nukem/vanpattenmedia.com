---
title: 3 more tips to boost WordPress security
author: Chris Van Patten
layout: post
permalink: /2012/3-more-tips-to-boost-wordpress-security/
dsq_thread_id:
  - 829809276
---
# 

Last time, I walked you through three tips to help you resist WordPress hackers. Today, I have a few more tips that will guide you to a safer WordPress install.

### 1. Keep your installations separate

A great preventative measure is to separate WordPress installs on your server. It takes more setup time, but by sandboxing installs you reduce the risk of cross-pollination and hacks affecting multiple websites on your server.



You should also make sure, if you’re controlling the stack on your server or VPS, to sandbox PHP. It’s not uncommon to set up separate users that share a global PHP user. Unfortunately, this negates the whole separation process! PHP-FPM makes it (relatively) easy to [use different pools for different hosts][1], so you reduce the risk of hacks affecting multiple sites.

 [1]: http://www.if-not-true-then-false.com/2011/nginx-and-php-fpm-configuration-and-optimizing-tips-and-tricks/

It’s also wise to do the same with MySQL. **Never** use the root user, and never use a single MySQL user across multiple WordPress installs. The extra effort will up front will save you over the long term.

We’ll be covering more specific server-side security tips over the next few weeks.

### 2. Security through obscurity

The merits of security through obscurity have long been debated, and everyone has an opinion on the matter. Whether it works or not, it’s ultimately an easy and fast way to add some extra piece of mind, and certainly worth considering.

Be sure to remove your readme.html, or block access to it. There are also a number of things you can drop in a plugin or your functions.php file that will prevent WordPress from injecting its version number or other identifying information in your site’s rendered source code.

Here’s a bit of code that removes the WordPress version number from RSS feeds, borrowed from our plugin [rach5-helper][2]:

 [2]: https://github.com/vanpattenmedia/rach5-helper

`function vpm_disable_version() { return ''; }
add_filter('the_generator', 'vpm_disable_version');`

You can selectively remove the “generator” meta tag with this bit of code:

`function vpm_head_cleanup(){ remove_action('wp_head', 'wp_generator'); }
add_action('init', 'vpm_head_cleanup');`

Security through obscurity shouldn’t be your first defense, but it’s great as part of a larger strategy.

### 3. Stay informed, and stay paranoid

It’s important to stay up-to-date on the current state of plugin security. Subscribe to a blog like [WPSecure.net][3] (one of my personal favorites; their security guides are also stellar) and use [Google Alerts][4] to monitor for vulnerabilities in the plugins you use.

 [3]: http://wpsecure.net/
 [4]: http://www.google.com/alerts

It’s also important to stay paranoid (but not too paranoid) and make sure you’re following security best practices across the board. Just because you have locked down WordPress doesn’t mean you’re totally safe. Like the hack of journalist Mat Honan [revealed a few weeks ago][5], our digital lives are interconnected. You need to follow best practices across the board, or risk the weak link breaking. Enable two-factor auth when it’s available. Use strong passwords. Set up separate email addresses for client and personal tasks.

 [5]: http://www.wired.com/gadgetlab/2012/08/apple-amazon-mat-honan-hacking/

Remember: security seems tedious until you’re fighting a hack. Preventative measures are crucial.

### More soon…

Thanks for following along with these tips. We’ll be sharing more tips soon that walk you through general-purpose security guidelines and how to lock down an average VPS, so stay tuned.

Have questions or tips for your fellow WordPress users? Share them in the comments!