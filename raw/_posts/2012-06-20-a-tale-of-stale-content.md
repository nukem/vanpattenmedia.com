---
title: A Tale of Stale Content
author: Peter Upfold
layout: post
permalink: /2012/a-tale-of-stale-content/
---
# 

[![Engine room, by Maggie Stephens][2]][2][“Engine room”][2], by Maggie Stephens (Pot Noodle) on Flickr. Licensed under [CC-BY][3]. 
***The low-attention-span “I-just-want-this-problem-fixed-now” version:** if you’re having trouble with Nginx serving up stale static content, and you’re running it in a virtualised environment, try setting `sendfile off;` in the configuration file (either under that `server`, or set it globally under `http`).  
*

 []: https://secure.flickr.com/photos/maggiew/6145245962/
 [2]: https://secure.flickr.com/photos/maggiew/6145245962/
 [3]: http://creativecommons.org/licenses/by/2.0/deed.en_GB

Abstraction. It’s something we take completely for granted in the computer world. Even as I write this, there are countless processes going on in my computer, beneath the browser into which I type. I don’t, and shouldn’t have to, understand all of them to get this blog post written.

Sometimes a problem comes up that is just *weird*. It seems completely illogical. But these computery things are supposed to be nothing but logic, right?

When we eventually arrive at the solution, after many hours of hair loss and bad language, we are reminded of the sheer complexity of these systems. Our assumptions about how something at a higher level *should* behave are entirely dependent on the premise that the lower levels are all doing exactly as expected too.

It’s humbling, in a slightly odd technical sense. We all need to be humbled sometimes.



### The Problem

We’re working on a shiny new workflow for development and deployment of the websites we build. This new way of working employs various tools including [Git][4], [Puppet][5], [Capistrano][6] (in its most spiffy multi-stage configuration), [Vagrant][7] (going hand-in-hand with [VirtualBox][8]), [Nginx][9], [PHP-FPM][10] and [Varnish][11].

 [4]: http://git-scm.com/
 [5]: http://puppetlabs.com/
 [6]: https://github.com/capistrano/capistrano
 [7]: http://vagrantup.com/
 [8]: https://www.virtualbox.org/
 [9]: http://wiki.nginx.org/Main
 [10]: http://php-fpm.org/
 [11]: https://www.varnish-cache.org/

While working inside a Vagrant development box, some changes were made to a static file — a CSS stylesheet, in this case. Nothing unusual about that.

On reloading the page in the browser, the file hadn’t changed. Caches were cleared, caches were even disabled, but Nginx still served us up the old file. Even more oddly, the ‘last modified’ timestamp would update to the last time we saved the file, but we’d still be served the stale content.

So, we moved away from Vagrant — and tried to reproduce the problem on our new Nginx Varnish web server. The same result — change the file, but get served stale content, even when all the caches had been brought out of the equation.

### The Solution

By this point, I had decided that it was likely Nginx that was the culprit. After all, we’d practically eliminated every other part of the system that could be the problem. Every great story has the perfect opportunity for a montage. Well, at this point, imagine me going through the Nginx config file, line by line, to an appropriate problem solving tune.

I stumble across:

`sendfile on;`

Hmmm — interesting. I wonder [what it does][12]?

 [12]: http://wiki.nginx.org/HttpCoreModule#sendfile

It turns out that it makes Nginx invoke the `sendfile()` feature of the Linux kernel to get the file from the disk. It’s lower overhead than the alternative, which is for Nginx to ask the kernel to do a `read()` and then a `write()`.

Except that, apparently, [sendfile doesn’t work so well in virtualised environments][13] like VirtualBox, where our development Vagrant box runs. It doesn’t seem to work properly under Xen either, the environment that our hosting provider Linode uses to give us a virtual private server.

 [13]: https://abitwiser.wordpress.com/2011/02/24/virtualbox-hates-sendfile/

I thought I had eliminated every other part of the system except Nginx. I hadn’t.

Every assumption I was making depended on the truth that everything underneath Nginx was behaving exactly as expected too. It wasn’t. **This issue was caused by a peculiarity in the *kernel*** of the virtual machines.

Switching that setting to `sendfile off;` instantly solved all of our woes. Maybe we lose the most minute modicum of performance — but that’s what all the other layers of caching are for!

### From Frustration, Forward

Despite the frustration caused, I actually think this was a really fascinating problem. Again, it is *humbling*, in the sense that it reminds us at how many different levels we are standing on the shoulders of the tech that came before.

It underlines my belief that to be really good at IT problem solving, you need to have (at least a basic) **end-to-end understanding** of a system.

Computers aren’t magic. When they work, it might seem like it. But when they don’t, you get an opportunity to begin to break that illusion down, piece by piece. You’ll start immensely frustrated, but, each time you get to that resolution, you end up a little more enlightened.
