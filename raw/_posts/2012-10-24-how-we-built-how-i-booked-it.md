---
title: 'How We Built It: The process behind HowIBookedIt.com'
author: Chris Van Patten
layout: post
permalink: /2012/how-we-built-how-i-booked-it/
dsq_thread_id:
  - 898082072
---
# 

I’m so happy with the HowIBookedIt.com, our new side project that tells the success stories of some awesome theatre talents and shares their advice with the next generation of theatre artists.

It’s been a blast to put the interviews together, and it was a lot of fun to actually build the site too. HIBI was a quick, fun build and I thought I’d share the pieces and parts that made it happen.





### The wpframe Game

The site is on our new server, and as a consequence is on a LEMP (Linux, nginx, MySQL, PHP) stack. To make the development and deployment process easier and more uniform, I used our [wpframe][1] framework to simplify the process. wpframe made it easy to set up a local environment for development, and made deploying to staging and production servers a breeze.

 [1]: http://github.com/vanpattenmedia/wpframe

### The Style File

I actually used a number of nifty CSS tools while building How I Booked It. As usual, I put [Compass][2] and [Sass][3] through their paces—after all, we have Compass support baked into wpframe.

 [2]: http://compass-style.org/
 [3]: http://sass-lang.com/

I also used the excellent [Normalize.css][4], a great CSS reset. Normalize is different than most resets because rather than “resetting to zero” it preserves consistent defaults so you don’t waste time re-inventing the wheel. I highly recommend it for most projects; you’ll find yourself saving time and energy with Normalize.

 [4]: http://necolas.github.com/normalize.css/

The very intriguing [Inuit.css][5] also came into play. Inuit.css is a very nifty framework of design patterns and abstractions, setting you well on your way to object-oriented CSS goodness. I didn’t use Inuit.css in its raw form, and opted to cherry-pick certain pieces as I built my own styles.

 [5]: http://inuitcss.com/

Did I mention the site is fully responsive?

### A JavaScript Trip

All the JavaScript (some AdSense and Analytics aside) is jQuery-powered. The JavaScript is minified by [Jammit][6] using [UglifyJS][7]—another wpframe perk—and linked from the site through our [QuickAssets][8] library (the CSS is too).

 [6]: http://documentcloud.github.com/jammit/
 [7]: https://github.com/mishoo/UglifyJS
 [8]: https://github.com/vanpattenmedia/quickassets

### Fontasia

[Fontello][9]—a wonderful tool for generating your own webfont—is the source of the various icons on the site. I can’t recommend Fontello highly enough. Because your fonts contain only the icons you choose, the fonts load faster. You can also map specific key characters to the icons, to make semantic icons within reach.

 [9]: http://fontello.com/

I used [Typekit][10] for the text fonts, although it works well with fallbacks too!

 [10]: http://typekit.com/

### Behind the hood

The site itself is powered by the [WordPress][11] 3.5 beta (currently beta 2). I wasn’t sure if 3.5 would be ready in its first beta, but after playing around with it I knew it was good enough for my needs. I’ve loved playing with the new media uploader, and the streamlined buttons and post editor are wonderful as well.

 [11]: http://www.wordpress.org/

### Plugin Power

I also made use of several existing WordPress plugins, mainly to streamline the posting process.

Those plugins include:

*   [Editorial Calendar][12] for scheduling content
*   [Duplicate Post][13] to easily clone from a “template” draft, making it easier to prepare new interviews
*   [Public Post Preview][14] so interviewees can see their interviews ahead of publication

 [12]: http://wordpress.org/extend/plugins/editorial-calendar/
 [13]: http://wordpress.org/extend/plugins/duplicate-post/
 [14]: http://wordpress.org/extend/plugins/public-post-preview/

I also wrote a few custom plugins. The custom plugins set up an AdSense shortcode, inject post meta into the site’s RSS feed, and [customize TinyMCE with style select][15] (among other goodies).

 [15]: http://www.vanpattenmedia.com/2012/tinymce-wordpress-style-selector/

### Share your thoughts

I’d love to get feedback from other developers on this stack. What am I missing? What would you like to hear more about? Interested in code samples?

[Share your thoughts below in the comments!][16]

 [16]: #comments