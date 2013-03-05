---
title: Rach5 updates and changes
author: Chris Van Patten
layout: post
permalink: /2012/rach5-updates-and-changes/
dsq_thread_id:
  - 651577642
---
# 

Hey mad scientists of the world:

I just unveiled a bunch of changes to **Rach5**, our boilerplate for building better WordPress websites. Rach5 is a full package for building in WordPress from the ground up, aimed at giving you the tools you need (and a few sensible defaults) and then getting out of your way. It’s your design: we just help you get from 0 to 60 a lot faster.

Here’s what’s new today:

*   **The whole theme has been reconfigured to remove the scourge of tag spanning across files.** Although it’s introducing a bit of code duplication as a result (the bulky HTML5-compatible doctype), it should make it significantly easier to get a bigger picture of your code and markup at a glance.
*   **inc/functions.php has been cleaned up,** and we’ve started separating functions out to functionality-appropriate files. This should make it easier to update files, as well as override specific unneeded features.
*   **rgbapng is now a required rubygem.** This great gem lets you create RGBA backgrounds that are compatible in any browser that doesn’t support RGBA natively, by generating an alpha-transparent PNG of the appropriate color and alpha transparency. If IE6 is a priority, use the also-included **DD_belatedPNG** to get alpha-transparent PNG support.
*   Rach5 now **bundles the responsive media queries from Skeleton**, a great CSS boilerplate. We are *not* including the style components of Skeleton, as the aim of Rach5 is to be (almost) completely style agnostic.
*   The default **font stacks are now more specific, and now include open source fonts** from the Liberation and GNU OpenFont families.
*   **homepage.php has been removed in favor of front-page.php**, a standard WordPress template file.

There are a whole bunch of other changes (removed files, new paths, etc.) but above are the major changes that will most affect the way you use Rach5.

I’m really excited about the direction Rach5 is going. I’d love to hear your feedback and ideas, as well as questions and concerns.

Thanks so much!