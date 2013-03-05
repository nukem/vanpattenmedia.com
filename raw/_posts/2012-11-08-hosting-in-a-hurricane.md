---
title: Hosting in a Hurricane
author: Peter Upfold
layout: post
permalink: /2012/hosting-in-a-hurricane/
dsq_thread_id:
  - 916224870
---
# 

Millions of lives across the Eastern United States and the Caribbean have been affected by Hurricane Sandy over the last week. For some, the cost was measured in dollars, but for others, in lives. Our thoughts are of course with all those who have been and continue to be affected.

For Van Patten Media, we consider ourselves extremely fortunate that the challenges Sandy brought were mostly only technical ones.

We have learned a lot through the preparation for and the recovery from Sandy, however, and we’d like to share our reflections.



### When Clouds Collide

Like many internet businesses, our servers are ‘in the cloud’ — completely virtual. We use a pair of Linode 768 virtual private servers.

They are virtual in the sense that they don’t occupy a whole physical machine each and can flexibly be moved from one place to another, but they still do need to exist on *a* physical machine somewhere. That physical ‘host’ server needs to sit in a data center, and the one we chose was Linode’s Newark, NJ facility, for its geographical proximity to most of our customers.

Being physically located in Newark, NJ as the storm rolled in was a problem. Of course, the data center facilities include backup generator power, but with the possibility of flood damage taking out the generators too, there was a significant risk of prolonged loss of service for all our customers.

### Cloning for Contingency

In preparation, we used Linode’s [built-in ‘clone’ feature][1] to copy our servers to their London facility, where they would be well out of the way. Once the clones completed, we altered the hostnames and other machine-specific configurations — for example, these changes created new, separate backup sets for our cloned machines, so we did not confuse our existing backups with the new ones.

 [1]: http://blog.linode.com/2007/11/16/clone-a-linode-to-another-linode/

The clone worked quite well, bar a few inconsistencies that needed to be addressed. However, we relied entirely upon this particular proprietary feature of the Linode platform. We also relied entirely on the fact that we had prior knowledge of the possibility of downtime to make these preparations. What if we had not had that early warning?

On our [Managed Hosting platform][2], we are using our [wpframe][3] project for all our sites. This system stores and manages not just the site’s code, but its configuration too, and is a key part of our Managed Hosting. Tools like Puppet and Capistrano are built-in to wpframe, and they allow us to redeploy a site with one button.

 [2]: http://www.vanpattenmedia.com/services/hosting/
 [3]: https://github.com/vanpattenmedia/wpframe "wpframe"

So, in the case of a wpframe site, it is very easy to ‘clone’ it without anything extra – all you need is the wpframed site’s Git repository, the (open source) software stack that wpframe depends on, a database backup, and a new server at which to target your deployment.

With our legacy sites that do not use wpframe — the situation is more complicated. I have no doubt that we could restore everything, because we, of course, back it all up! However, the level of human intervention required to restore an individual site is higher, because the process of reconfiguration has not been automated in the same way. This means that restores take more time and need more manual testing and verification.

Clearly, if our legacy platform will continue to be around, we need to do more to automate the restore process of these sites’ code, configurations and databases.

### Dealing with DNS

The Domain Name System (DNS) is a critical part of any site’s infrastructure. Without the abilty to look up the name, *vanpattenmedia.com*, and turn it into the IP address of this server, no website visitor could access our website. At all.

So, once our clones were completed, we needed to go through all of the sites that had moved and change this mapping, so that requests pointed to our London-based servers. If the Newark facility did go down, visitors would be sent to London anyway and would be unaffected.

DNS is a hierarchical, distributed system, which means that when changes are made, you need to wait for other DNS servers to notice these changes and update their records (we sometimes call this process ‘propagating’). Only when all these records have been updated can you be sure that visitors will come to the right place. And it is only when the ‘TTL’ timer expires for a record that the other DNS servers will come back and see if there are any updates.

One of our challenges was that we had long TTL values for many of our sites. Long TTLs are normally good, as they help keep DNS running efficiently, but in a situation where we wanted to move sites over to London quickly, we were at the mercy of however long these timers had left to run.

We were prepared with sufficient time before the storm hit that we *did* have time for these timers to expire before we switched all traffic over to London (and we then reduced the TTLs to 5 minutes). But, again, what if we hadn’t had the advance warning?

How we manage DNS in the future needs to take into account this ability to swiftly ‘fail over’ to another machine and direct site visitors elsewhere, while we set to work fixing the machine that has broken (or wait for somebody else to do so, if the failure is their responsibility).

### Weather Wisdom

As it happened, the Newark data center [stayed up throughout the storm][4], but the risk of its failure was such that not taking action was not an option.

 [4]: https://twitter.com/linode/status/263295215878688768

What we were able to do was to use this as an opportunity to test our emergency procedures and we have identified areas where we could be doing more. We will be working to improve many of these behind-the-scenes contingency plans in the coming weeks.

Again, I am reminded that we are fortunate that our concerns have been commercial — that we have only had to worry about computers and code, and not the loss of life and homes. As the world outside the affected areas continues as normal, let us take a moment to remember that there are people who still need [our][5] [help][6].

 [5]: http://www.redcross.org/ "American Red Cross"
 [6]: http://www.redcross.org.uk/hurricanesandy/ "British Red Cross for Caribbean relief"