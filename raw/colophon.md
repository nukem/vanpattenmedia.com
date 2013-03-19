---
title: Colophon
author: Chris Van Patten
layout: page
infooter: true
permalink: colophon/
---

Van Patten Media is exists thanks to a number of awesome open source technologies and great online services. In no particular order, here’s a (fairly) comprehensive list.

### Hardware

This site–and many of our client sites–are served off a pair of [Linode 768](http://www.linode.com/?r=a2aaee5d92af5295a5b13764a5a69a166e7fc7e2)s (referral link).

### Software

The aforementioned Linode VPSs are powered by Ubuntu (12.04 LTS, if you’re particularly interested). Our legacy VPS (cruella) uses Apache, [suPHP](http://www.suphp.org/Home.html), and MySQL for the full LAMP experience. Our newer VPS (pongo) uses Nginx, php-fpm, MySQL, and Varnish.

We have a number of security measures in place, but perhaps chief among them is [Tripwire](http://sourceforge.net/projects/tripwire/). Uptime is monitored with [Pingdom](http://www.pingdom.com/).

### VanPattenMedia.com

VanPattenMedia.com is powered by [Jekyll](https://github.com/mojombo/jekyll).

We use [Compass](http://www.compass-style.org/) with [Sass](http://www.sass-lang.com/) for our stylesheet needs. JavaScript is concatenated and minified by [Jammit](https://github.com/documentcloud/jammit) using the [UglifierJS](https://github.com/lautis/uglifier) compressor. [image_optim](https://github.com/toy/image_optim) helps keep image file sizes in check.

This website is open source, and you can contribute by visiting the [vanpattenmedia.com repo on Github](https://github.com/vanpattenmedia/vanpattenmedia.com) to file an issue or pull request.
