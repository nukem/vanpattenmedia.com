---
title: 'New plugins: SSO Cross Cookie and SSL Subdomain'
author: Peter Upfold
layout: post
permalink: /2012/new-plugins-sso-cross-cookie-and-ssl-subdomain/
dsq_thread_id:
  - 626534603
---
# 

We are pleased to announce two new WordPress plugins designed for supporting SSL security *and* custom domains in WordPress Multisite — [SSL Subdomain][1] and [SSO Cross Cookie][2].

 [1]: http://wordpress.org/extend/plugins/ssl-subdomain-for-multisite/ "SSL Subdomain for Multisite on the WordPress plugin directory"
 [2]: http://wordpress.org/extend/plugins/sso-cross-cookie-for-multisite/ "SSO Cross Cookie on the WordPress plugins directory"

I have discovered that trying to explain what these plugins do succinctly and generically while being accurate is actually quite difficult, so let’s do a scenario!

## The Scenario

We have a WordPress Multisite network. Let’s call it `mynetwork.com`. We bought a fancy SSL wildcard certificate so we can offer `*.mynetwork.com` over a secure connection.

We’d very much like to use this secure connection for all logins, and for all admin access.

We also allow sites on this network to use a custom domain — like `demo-site.com`. We might be using [WPMU Domain Mapping][3] to achieve this. These sites have two domains, then — `demo-site.com` and `demo-site.mynetwork.com`.

 [3]: https://wordpress.org/extend/plugins/wordpress-mu-domain-mapping/

If we switch on `FORCE_SSL_LOGIN` or `FORCE_SSL_ADMIN`, we have a problem. When users go to `https://demo-site.com/wp-login.php`, they get a certificate error. We have a wildcard certificate for `*.mynetwork.com`, but we can’t possibly have a valid SSL certificate installed for every custom domain!

Instead, we want to force all login pages and admin pages to be:

`https://demo-site.mynetwork.com/wp-admin/`…

We want all regular access to be:

`http://demo-site.com/`…

[SSL Subdomain][1] solves this first problem — rewriting the URLs so that your network sites are accessed over their custom domains over HTTP, but that all login and admin access is over the SSL-secured subdomain.

This still leaves us with one problem — when a user logs in to their admin panel, they are logged in to that, but not to their site URL on the custom domain. The two locations are separate domains, and therefore require separate cookies that let WordPress know you are logged in.

This is where [SSO Cross Cookie][4] steps in. As its name might suggest, it sets a cookie across both domains, allowing for Single Sign On (SSO). In concert with the first plugin, we now have:

 [4]: http://wordpress.org/extend/plugins/sso-cross-cookie-for-multisite/ "SSO Cross Cookie on the WordPress plugin directory"

*   Regular site access using the custom domains.
*   Login and admin over SSL-secured subdomains, always.
*   Seamless single sign on for access to both the SSL-secured admin panel and the actual site on the custom domain.

The best of both worlds — and as secure as we possibly can be without having the expense and complexity of an SSL certificate (and therefore a separate server IP address) for each and every custom domain on our network.

To download and for more information, see the pages on the WordPress plugin directory for [SSL Subdomain][1] and [SSO Cross Cookie][2].

If you want to follow bleeding-edge development more closely, there are also GitHub projects for [SSL Subdomain][5] and for [SSO Cross Cookie][6].

 [5]: https://github.com/vanpattenmedia/ssl-subdomain-for-multisite "SSL Subdomain on GitHub"
 [6]: https://github.com/vanpattenmedia/sso-cross-cookie-for-multisite "SSO Cross Cookie on GitHub"