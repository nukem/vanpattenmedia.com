---
title: Simplify your assets with QuickAssets
author: Chris Van Patten
layout: post
permalink: /2013/simplify-assets-with-quickassets/
dsq_thread_id:
  - 1003074357
---

Smart caching is a powerful way to ensure your websites are as fast as possible. Letting your users’ browsers save copies of images or stylesheets and reference those on subsequent page reloads means less download time, fewer wasted server resources, and happier users. In the age of CDNs that price by the download, smart caching is even a great way to save money.

But what happens if you need to reload an asset with a long cache life? Maybe you have images set to expire after a month, but you decided to redesign your logo. It could be several weeks before some users see the new logo, if they don’t know to clear their cache! How do you handle these situations?

You use cache-busting, and trick the user’s browser into downloading a new file. By renaming the file so it appears to be a new file entirely, or even appending a string of characters to the file, you can force browsers to download new versions of your file.

As we got more strict about our caching practices, we realised we needed a better way to ensure browsers loaded new versions of files, even if they had long cache lifetimes set. To accomplish this, we built a small (but powerful) utility, [QuickAssets][1], that helps solve the problem.

 [1]: https://github.com/vanpattenmedia/quickassets



QuickAssets helps you generate URLs that will dynamically update every time a file is modified. It is incredibly flexible, letting you set the format of the URL, how the script detects file modifications, and more. You can configure it to support multiple “asset types,” letting you handle different types of files (CSS, JS, images, etc.) in different ways.

I put together a [short video series that walks you through the basic setup of QuickAssets][2]. We’ve [posted part one][3] below, and will be adding more parts in the coming weeks. Be sure to [visit the Van Patten Media channel on YouTube][4] and subscribe so you can get alerts about our future videos!

 [2]: http://www.youtube.com/playlist?list=PL7VHhnanw97sN4jJ3z1heQo-qEiyjKYAL&feature=view_all
 [3]: http://youtu.be/6fFOvsPMo2Y
 [4]: https://www.youtube.com/user/VanPattenMedia

By the way, [QuickAssets is open source on Github][1]. If you run into any problems or have any feature ideas, file an issue or submit a pull request. We love suggestions and contributions!
