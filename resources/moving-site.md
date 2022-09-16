---
title: Moving your site
description: Learn how to move your site and its data to another server.
layout: docs
---

Learn how to move your site and its data to another server. {% .lead %}

---

It doesn't happen *often*, but there are times where you want or need to move your site from one server to another. It can seem like a pretty daunting task, but in reality it's pretty straightforward.

## Put the old site into maintenance mode

This is an important step because it ensures that no one is changing any data in the site while you're working on migrating to a new server. Once you've put the site into maintenance mode, it's a good idea to wait 15-30 minutes to ensure everyone who was in the site has finished what they're doing and are no longer able to access the site.

{% callout title="Moving the domain name" %}
If you're also moving the domain from the old server to the new server, there can often be delays while the DNS records propagate where the domain will be pointing at the old server instead of the new server. Putting the site on the old server into maintenance mode gives you a good way of knowing immediately which server the domain is pointed at.
{% /callout %}

## Backup your site from the old server

The first step is to take a [full backup](/docs/2.6/backing-up-nova) of your site from the old server, both the database and the files. This ensures that you have everything you need to move the site to another server.

## Upload your site files to the new server

While the specific order isn't important, we like to start with uploading the files to the new server through your [FTP client](/docs/2.6/before-getting-started#ftp-client).

## Import the database on the new server

With the files uploaded to the web server, you can move to the new server's database. Like we talk about in the Backing Up Nova page, there are a variety of ways to access phpMyAdmin so if you have questions, reach out to your web host for help.

1. Log in to phpMyAdmin.
2. Click on the Import tab across the top of the page.
3. In the file to import section, click on **Choose File** and select the `.sql` file that you exported from the older server

It may take a few minutes depending on the size of your database, but phpMyAdmin will import your database from the older server into the new server.

## Update the database credentials

The final step is to open the `application/config/database.php` file and update any of your credentials to ensure you're connecting to the database on the new server. In particular, you want to be paying attention to these values:

```php
$db['default']['username'] = 'username';
$db['default']['password'] = 'password';
$db['default']['database'] = 'database';
```

## Take the new site out of maintenance mode

### Changing domain name

If you are changing domain names while moving your site, you can log in at the new URL and take the site out of maintenance mode like you normally would.

### Moving domain name

If you are moving your domain to a new server as well, you'll need to ensure the DNS records have been properly updated before continuing. Once the DNS records have been updated, you'll want to take the new site out of maintenance mode, but in order to do that, you'll likely need to manually update the database since trying to use the domain name will usually take you to the old site.

1. Log in to phpMyAdmin
2. Navigate to the `nova_settings` table
3. Find the row that has a `key` of **maintenance**
4. Update the row and set the value to **off**
5. Save the row

The new site should now be out of maintenance mode. When you navigate to the domain, if you see the site in maintenance mode, then you know the DNS records haven't propagated yet. Once you refresh and see the site out of maintenance mode, then you know everything has properly transferred.

## Test your site

Now that everything has been moved to the new site, you can test that everything works as expected.
