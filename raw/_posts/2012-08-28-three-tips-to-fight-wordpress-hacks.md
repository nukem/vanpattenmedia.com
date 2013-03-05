---
title: Three tips to fight WordPress hacks
author: Chris Van Patten
layout: post
permalink: /2012/three-tips-to-fight-wordpress-hacks/
dsq_thread_id:
  - 821542872
---
# 

I frequently get asked questions like “how do I keep my site from getting hacked” or “is WordPress secure?” In fact, it was a big topic at the last [Buffalo WordPress Meetup][1]. It’s a subject that won’t go away given WordPress’ rather sticky security history, so I thought I’d take some time to address the issue and offer some tips for battling the hackers.

 [1]: http://www.wpbuffalo.com/

The most important thing to understand as you begin your quest toward hack-free WordPress is that **WordPress core is** (as much as any piece of software can be) **secure**. The days of security inattentiveness in core are past. Unfortunately, the attack vectors haven’t vanished: they’ve just shifted away from core vulnerabilities. That brings us to our first tip:

### 1. Understand the plugins you use and keep them updated

![][2]Keep your plugins updated. 
It is *absolutely critical* that you take the time to understand which plugins you have installed, when they were last updated, whether they are listed as compatible with your current version of WordPress, and—above all else—**ensure they are up to date**. WordPress makes it easy to keep plugins updated, but it doesn’t go as far as to execute the updates for you. Make sure you’re logging in regularly and actually running the updates!

 [2]: http://static.vanpattenmedia.com/content/uploads/2012/08/plugin-example-300x294.png "plugin-example"

If you’re a developer, take the extra time to scan a plugin’s code. Even if your PHP knowledge is elementary, you can get a good idea about the plugin based on how the code itself is written.

*   Does the plugin follow the [WordPress coding standards][3]?
*   Does it use a modern OOP-based design (if applicable)?
*   Do you see code in place for [validating forms][4] and properly echoing user output?
*   Is the code nicely documented inline?

 [3]: http://make.wordpress.org/core/handbook/coding-standards/
 [4]: http://codex.wordpress.org/Data_Validation

While you should never judge a plugin solely on these merits (don’t judge a book by its cover, etc.) this can be a great quick way to evaluate how much care a plugin developer takes in his or her plugin, especially if you’re split between two similar options.

### 2. If you don’t use it, *lose it!*

This applies to themes as well as plugins. If you’re not using a theme or plugin, don’t just deactivate it: take the time to back it up and remove it from your production environment. Unmaintained code that’s left on your server is subject to attack like any other bit of code. And while WordPress will keep actively developed themes and plugins up-to-date, it can’t help you with [abandonware][5], which can often be the most vulnerable.

 [5]: https://en.wikipedia.org/wiki/Abandonware

In [last year’s TimThumb vulnerability][6], a huge number of sites got hit that had deactivated themes with TimThumb—particularly sites that used one-click installs that installed more than the standard 2010 and 2011 themes. With that in mind, a good corollary would be to **avoid one-click installs** because they install a lot of extra content that could get you in trouble down the road!

 [6]: http://markmaunder.com/2011/08/01/zero-day-vulnerability-in-many-wordpress-themes/

### 3. Secure your logins

Having a secure login is a great way to stop hackers trying to get into your admin panel. The easiest way to start is just by setting your admin username to something other than admin, and your password to something a bit harder than “passw0rd”. I use the wonderful tool [1Password][7] to help me manage my passwords, and it’s a great way to use a more secure password without the need to memorize 36 character randomly generated strings of text. That’s the program’s job.

 [7]: https://agilebits.com/onepassword

![][8]Use Google Authenticator to enable two-factor login on your WordPress blog 
Another great way to strengthen your login is by enabling two-factor authentication through the [Google Authenticator plugin][9]. It is not always easy to convince clients to use two-factor auth, but for your personal sites it’s a no-brainer.

 [8]: http://static.vanpattenmedia.com/content/uploads/2012/08/gauth-logo.jpg "gauth-logo"
 [9]: http://wordpress.org/extend/plugins/google-authenticator/

Finally, install a plugin like [Limit Login Attempts][10]. This will block users from your website if they try (and fail) to log in to your site too many times.

 [10]: http://wordpress.org/extend/plugins/limit-login-attempts/

### That’s just the start…

WordPress security ultimately has less to do with WordPress, and more to do with common sense and general web development best practices. Things like two-factor auth, strong passwords, and ensuring your dependencies (plugins) are well-maintained and up-to-date are great tips no matter what CMS or framework you use.

These three tips are a great start for security, and next time I’ll cover even more tips that can help your WordPress site (or any site) get locked down tight!

Have questions or things you want me to cover? Share your thoughts in the comments!