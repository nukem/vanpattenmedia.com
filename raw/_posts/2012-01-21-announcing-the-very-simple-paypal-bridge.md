---
title: Announcing the Very Simple PayPal Bridge
author: Peter Upfold
layout: post
permalink: /2012/announcing-the-very-simple-paypal-bridge/
dsq_thread_id:
  - 664485792
---
# 

As part of our ongoing commitment to the free software and open source communities, we are very excited to announce the release of a new project — the [Very Simple PayPal Bridge][1], released under a [Modified BSD License][2].

 [1]: https://github.com/vanpattenmedia/vspb "Very Simple PayPal Bridge"
 [2]: https://github.com/vanpattenmedia/vspb/blob/master/LICENSE.md "The license for VSPB"

Interacting with the PayPal NVP API is something that a lot of e-commerce websites need to do. If you’re writing your own code for a bespoke e-commerce solution, rather than shoehorning in generic ‘Shopping Cart’ software, there is quite a lot to think about in order to communicate successfully with the API and provide a great payment experience for the site’s customers.

The [Very Simple PayPal Bridge][1] is a PHP class that, as the name suggests, provides a very simple interface for the PayPal NVP API.

In any situation where you need to interface more directly with the PayPal API, the VSPB provides a clean interface for the other layers of your code, dealing with all of the implementation details of sending requests via cURL, encoding and decoding the arguments, as well as offering full support for graceful error handling with PHP exceptions. It is great as a lower-level component of a wider PHP e-commerce solution.

For the full lowdown on the project and to get the code, please go to [its page on GitHub][3].

 [3]: https://github.com/vanpattenmedia/vspb "The GitHub page for VSPB"