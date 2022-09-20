---
title: Configuration
description: Learn how to configure Nova 2 from the simple to the advanced.
layout: docs
---

{% $markdoc.frontmatter.description %} {% .lead %}

---

## Nova

In most cases, Nova's configuration happens from within the system itself. For everything else, configuration is handled through config files found in the `application/config` directory. (All references on this page to specific config files will be for files found in this directory.)

{% callout title="Warning" type="warning" %}
Be **very** careful when modifying config files. Errant changes to these files can result in major problems and in some cases cause your site to stop working altogether!
{% /callout %}

### Genre

Nova supports multiple genres for games and stores the genre the game is using in the `nova.php` config file. More information about genres and how to change your site's genre after you've installed the system can be found [here](/docs/2.6/genres).

### Metadata

Nova comes with some default metadata that's picked up by search engines like Google and DuckDuckGo to display in search results. You can update the metadata for your through variables in the `application/config/nova.php` file.

Nova ships with the following default metadata:

- Author - Anodyne Productions
- Description - Anodyne Productions' premier online RPG management software
- Keywords - `nova, rpg management, anodyne, rpg, sms`

### RSS settings

RSS (Really Simple Syndication) is a web feed technology that allows users and applications to access updates to your site in a standardized way. This provides the ability for Nova to "broadcast" updates for different resources to anyone who's subscribed to one of those RSS feeds.

You can access the link to these RSS feeds from the individual pages for viewing a mission post, personal log, or news item. If you hover over the orange RSS icon, you can right-click and copy the address to the feed. For reference, here are the URLs for all of the possible RSS feeds Nova provides:

- `{your-site-url}/feed/posts`
- `{your-site-url}/feed/logs`
- `{your-site-url}/feed/news`
- `{your-site-url}/feed/wiki/created`
- `{your-site-url}/feed/wiki/updated`

Nova ships with the following defaults for all RSS feeds:

- Creator Email - john.doe@example.com
- Feed Language - `en-us`
- Description - Nova, Anodyne Productions' premier RPG management software
- Encoding - `utf-8`
- Number of entries - 25

### Thresher settings

Nova's integrated mini-wiki, [Thresher](/docs/2.6/using-wiki), has its own config file that allows admins to change the way content is stored and parsed. By default, Thresher will store and parse wiki page content as HTML, but you can also use BBCode and Textile for storing and parsing. You can change the parse type in the Thresher config file found at `application/config/thresher.php`.

{% callout title="Warning" type="warning" %}
Once you have selected a parse type, you shouldn't change it. If you change the parse type, your wiki pages will not display correctly.
{% /callout %}

## CodeIgniter

CodeIgniter is the underlying framework used to power Nova. In most cases, you won't need to change any configuration for CodeIgniter. If you do, you can find all of those config files in the `application/config` directory.

{% callout title="Warning" type="warning" %}
It's worth repeating again... be **very** careful when modifying config files. Errant changes to these files, especially CodeIgniter config files, can result in major problems and in some cases cause your site to stop working altogether!
{% /callout %}
