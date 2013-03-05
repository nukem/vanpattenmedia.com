---
title: Building a Responsive Web Design hardware arsenal
author: Chris Van Patten
layout: post
permalink: /2012/building-responsive-web-design-hardware-arsenal/
dsq_thread_id:
  - 769342350
---
# 

![][1]If you’re familiar with Responsive Web Design, you probably remember the first time you saw the technique in action. You probably resized your browser to test out the responsiveness in action. It was pretty awesome.

 [1]: http://static.vanpattenmedia.com/content/uploads/2012/07/IMG_2227-200x300.jpg "IMG_2227"

But resizing your browser to test a responsive website will only get you so far if you’re after detailed, high-quality results—and at Van Patten Media, detailed, high-quality results are the name of the game. Relying on resizing means you’ll miss out on web font incompatibilities, JavaScript bugs, and pixel density ugliness, among other things.

To test responsive websites right, you need to **build a hardware arsenal** that will let you test websites across a variety of platforms and devices so you know exactly how your website will operate in a number of situations.

### Choose your targets

Before you go out and start dropping cash, you need to decide what device types to target. If you’re working on redesigning or retrofitting an already-launched project, you can do that by checking existing site logs to see what types of devices are already using the site you’re working on. **If you can, figure out who existing users are and accomodate their devices first.**

If you’re building from scratch (or building a general purpose arsenal) you probably have no idea what your audience is using, so you need to do a bit of guesswork. While building our arsenal (still a work in progress), I prepared a list of device types I was interested in targeting:

*   Smartphones (3-5 inches) 
    *   iOS >= 5.0
    *   Android >= 2.3
*   Tablets (7 inch and 9-10 inch) 
    *   iOS >= 5.0
    *   Android >= 3.0 (ideally >= 4.0)

I then distilled those target types into a list of devices I thought would work well for my purposes:

*   4th generation iPod Touch (particularly for testing retina assets)
*   Android smartphone
*   7 inch Android tablet (ideally Kindle Fire or Nexus 7)
*   9 inch Android tablet (4.0 preferred)
*   iPad (current gen preferred)

### Aim…

Once you know what devices you’re targeting, **it’s time to start hunting**! My go-to source was [Craigslist][2], and I highly recommend it (or your local online classified service of choice). It’s a great way to get deals on lightly-used products. **Be sure to follow [safety best practices][3].** Be sure to **test devices before you buy**.

 [2]: http://craigslist.org/
 [3]: http://www.craigslist.org/about/safety

You’ll learn pretty quickly what’s easily available and what going rates are, making it easier to prioritize certain devices over others.

### Fire!

Once you’ve found some devices in your price range, start buying. After a day or so of emailing, calling, and texting potential sellers, my list ended up coming out like this:

*   4th generation iPod Touch (particularly for testing retina assets) **Bought!**
*   Android smartphone **Already owned!** (HTC Thunderbolt)
*   7 inch Android tablet (ideally Kindle Fire or Nexus 7)
*   9 inch Android tablet (4.0 preferred) **Bought!** (HP Touchpad with CyanogenMod 9 preinstalled)
*   iPad (current gen preferred)

I didn’t expect to get a current generation iPad, and I am still on the hunt for a 7″ tablet (specifically the Fire, because of its [unique browser][4]).

 [4]: http://www.amazon.com/gp/help/customer/display.html?nodeId=200775440

Even without the 7″ device or the iPad, adding an iOS device and a 9″ Android tablet to my arsenal means I can test on a vast range of devices I couldn’t before, and gives me opportunities to fix device-specific problems. And at Craigslist prices, it was pretty cheap too (and if you have your seller write a receipt, it’s tax deductible).

### Testing

When it comes to actually testing and playing, I recommend [Adobe Shadow][5]. It can be installed on iOS and Android devices, and it’s a great way to see how a website looks across a number of devices instantly. It also supports [LiveReload][6], and also comes with a modified version of the Webkit Web Inspector that lets you inspect pages on your devices (it’s a little buggy, but serviceable). Android devices running Ice Cream Sandwich (4.0) or later also have the ability to use [Chrome Remote Debugging][7], which is highly recommended.

 [5]: http://labs.adobe.com/technologies/shadow/
 [6]: http://livereload.com/
 [7]: https://developers.google.com/chrome-developer-tools/docs/remote-debugging

**Do you have a responsive web design arsenal? What devices do you use? What’s your workflow like? [Share your thoughts in the comments!][8]**

 [8]: #respond