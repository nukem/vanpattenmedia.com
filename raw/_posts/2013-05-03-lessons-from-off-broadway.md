---
title: 'Lessons from Off-Broadway: a Case Study'
author: Chris Van Patten
layout: post
---

One thing I'm particularly proud of about Van Patten Media is our ability to move quickly. Often, clients come to us with projects that other, larger agencies might take a year to complete, while we're able to deliver results in just months. That's due in part to our incredible automated workflow (full of tools like [wpframe](https://github.com/vanpattenmedia/wpframe)) and also due to our size. Because we're smaller, we can be more flexible and move resources around to accomplish bigger things in tighter timeframes.

But nothing we had done quite prepared me for the whirlwind development process of the new [OffBroadway.com](http://www.offbroadway.com/). The site is the official online home of Off-Broadway (supported by the League of Off-Broadway Theatres and Producers), and—up until recently—was powered by a legacy [Drupal](http://www.drupal.com/) installation that was difficult to use and nearly-impossible to customise. Earlier this year, the League hired us to overhaul and refocus the site's editorial, and it soon became clear that rebuilding the website would be necessary to make developing new content easy and fast. The catch? We wanted to get the new website ready in just **two weeks**, in time for the 2013 Lucille Lortel Awards (sort of the Off-Broadway equivalent of the Tony Awards).

## WordPress to the rescue

Right from the start, I knew we'd be migrating to WordPress. The vast majority of websites we've built are powered by WordPress, and it's the platform we're most comfortable with. Plus, it's designed for blog-style content: perfect for OffBroadway.com's needs.

Deciding how the front-end would be built was a little tougher. With our time frame, a fully custom design wouldn't be easy, but I didn't want to use a cookie cutter off-the-shelf theme (more often than not they introduce headaches rather than solve them). So I turned to [Foundation](http://foundation.zurb.com/) by [Zurb](http://zurb.com/), a "responsive front-end framework" that made it possible to rapidly prototype the new site. Because it took care of typography, the grid system, and (most of) the responsive components, I was able to focus on layout and content, which was my goal from the start.

We implemented [Total Slider](http://totalslider.com/) on the homepage, taking advantage of our open source plugin to save even more time. And as we fleshed out the site's structure, we were able to reuse other bits of code (like our [custom-wp-titles](https://github.com/vanpattenmedia/custom-wp-titles) script, open sourced as a result of this project) to speed along the process. I have a standard [custom post type mu-plugin](https://gist.github.com/chrisvanpatten/5512022) that I was able to use so I didn't have to rewrite a lot of custom post type declarations. And of course, the theme files were initially pulled from [rach5](https://github.com/vanpattenmedia/rach5), our bare-bones theme framework.

Using our own pre-existing code saved an enormous amount of time. By not having to write these elements from scratch, I was able to get from zero-to-prototype in a day as opposed to a week.

## Content Conversion

One of the challenges of this particular site was that the legacy content was in [Drupal](http://www.drupal.com/), and I had no easy way to export it. Fortunately, Drupal allows you to create custom "views", a fact I exploited. By creating new views that generated RSS feeds of the site's content, I was able to get a usable copy of the site's four year archive that WordPress' [RSS importer](http://wordpress.org/extend/plugins/rss-importer/) happily accepted (once I split it into batches).

The legacy site also featured theatre listings. While we don't have quite the same feature on the new site, we did want to build a database of shows (past, present, and future) that could serve as an educational/historical resource about the innovative theatre that makes up Off-Broadway. Simply exporting this content as an RSS feed wouldn't quite work due to the way the information was set up in Drupal. Instead, I used a human importer, my youngest brother Scott. He went through item by item and copied shows into the new WordPress install, accounting for synopses and show artwork. By himself, over the course of a few work sessions, he imported over 350 shows. Much easier than diverting my energy to build some kind of scraper to parse the old pages (and about as fast, all things considered)!

## Putting it all together

With the power of the [Posts 2 Posts](https://github.com/scribu/wp-posts-to-posts) plugin, we're now able to connect our different post types together: so, for example, a show can be related to a post, or a theatre can be related to a show, etc. In the near future, I'll be finding a way to automate these connections in our vast archive of content (only the most recent posts have these connections in place).

I also used [Custom Field Suite](https://uproot.us/) (the lighter alternative to Advanced Custom Fields) to handle certain bits of metadata, particularly in the shows and theatre pages. It makes it painless to manage custom fields visually, although going forward I'm hoping to do this in code (similar to how I handle the custom post types in an mu-plugin) to simplify deployment.

In the end, combining all these disparate bits of code, plugins, and other fun utilities made it easier for me to accomplish more with less time. Already, the new site just about matches the old site in terms of functionality, and in fact there's a lot in the new site that the old site couldn't do. Being based on WordPress now, the site will be able to evolve and change more quickly. Plus, because it's hosted on our managed hosting platform, we can deploy quicker and fix problems with minimal effort.

Building [the new OffBroadway.com](http://www.offbroadway.com/) has been a great lesson in the power of scaffolding and the usefulness of external dependencies. I can't wait to take these lessons and apply them to our next project!

_If you want your project to be our next project, [get in touch today](http://www.vanpattenmedia.com/contact/)._
