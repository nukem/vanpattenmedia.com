---
title: (Formally) introducing wpframe
author: Chris Van Patten
layout: post
permalink: /2012/formally-introducing-wpframe/
dsq_thread_id:
  - 754305885
---
# 

Over the past few months at Van Patten Media, as we’ve geared up toward launching [Managed Hosting][1], we’ve spent a considerable amount of time working on developing a modern development process as well.

 [1]: http://www.vanpattenmedia.com/services/hosting/ "Managed Hosting"

In planning, there were several core requirements our process needed to fulfill: multiple remote stages (staging and production environments), a local development environment, version management with Git, and well-integrated asset management, concatentation, and compression.

The pieces have slowly come together, and we’re thrilled to (formally) announce **wpframe**, our contribution to process-based WordPress development. **wpframe** is a largely Ruby-based infrastructure that wraps around WordPress, providing you with an easy framework for WordPress development.



### How it works

There are a few “levels” to wpframe.

The first level is the “**server level**“—all the code that provisions your server environment. We chose Puppet as our provisioner, and have configurations included that use nginx, php-fpm, and Varnish.

Our Puppet manifests also provision a Vagrant box, which is great for local development. Our Vagrant environment is currently based off a custom box, but we’re working on a way that you can start with a blank Ubuntu box. Stay tuned.

Second is the “**development level**“—essentially all the functions that directly affect how you code. In wpframe, that means asset management. We strongly believe in pre-compiling assets, and that’s how wpframe handles them. We use Compass to compile SCSS and Jammit to compile and concatenate JavaScript. Our own tool [QuickAssets][2] (more about that soon) handles cache-busting asset URLs.

 [2]: https://github.com/vanpattenmedia/quickassets

We’ve also included a basic Guardfile that will automatically compile SCSS and JavaScript on the fly. It also includes live-reload, so you can make changes and see them appear instantly in your browser!

The final level is the “**deployment level**“. We have a finely-tuned Capistrano configuration in place that handles the deployment of your site. It will upload database credentials (we keep them in a separate YML file—cool, right?), compile assets, and more. Our development version of **wpframe **also includes a tool to sync databases: we’ll be making it public soon.

### Should I use wpframe?

**wpframe** is not for everyone. You need to be familiar with the command line, and understanding Ruby is probably a bonus too (but to be fair, we’re still learning ourselves). And you probably won’t be able to use it out of the box: it’s built for our workflow, and there may be pieces and parts you don’t need, or want to change.

Still interested? Great! [Check it out on Github.][3] Feel free to fork it and make it work for your process. It’s a framework, not a final answer. We’d love to see what you do with it!

 [3]: https://github.com/vanpattenmedia/wpframe