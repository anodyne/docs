---
title: Installing Nova 3
description: Learn how to get Nova 3 up and running.
layout: docs
section: Getting Started
---

{% note %}
Looking to migrate your Nova 2 site to Nova 3? We've streamlined the process of migrating existing data, so once you've completed doing an install, you'll be prompted for whether you want to continue as a fresh install or migrate your data and you can continue reading the [migration guide](/docs/3.0/migrating-from-nova2).
{% /note %}

To begin, you'll first need to upload Nova's files to your server. This can be done through an FTP client (recommended) or through your host's web-based server management software like cPanel or something similar. If you're not sure how to connect to the server and upload files, contact your web host for help.

## Updating the document root

### What is a document root?

The _document root_ is the main folder on a web server where it stores the files that visitors see when they access your website. For example, when someone visits https://example.com, the web server looks in the document root to find the file or page to display.

On many shared hosting services, the document root is a folder named `public_html`. Any files you place inside `public_html` can be accessed through a web browser. Files outside of `public_html` are hidden from visitors, which is useful for keeping sensitive information secure.

### Why does this matter for Nova 3?

Nova 3 has been designed with a secure file structure that separates the parts of your application that visitors can access from the parts they cannot. This structure ensures that sensitive files, such as configuration details or database settings, are stored safely out of reach from web browsers.

To make this work, Nova 3 uses a public folder as the document root. This folder contains only the files that need to be visible to the public, like images, JavaScript, and the main entry point for the application (`index.php`).

If you are installing Nova 3 or upgrading from Nova 2, you’ll need to update your web server’s document root to point to the `public` folder instead of the default document root (likely `public_html`). This small change helps protect your site and keeps sensitive files hidden from prying eyes.

{% note %}
The following process only needs to be done once when you first install Nova 3 or migrate from Nova 2.
{% /note %}

### Updating the document root in cPanel

If your host provides cPanel for managing your site, you can set the document root for your website to point to Nova's `/public` folder with the following steps:

1. Log in to cPanel and find the Domains section
2. Click on Domains or Addon Domains, depending on whether you are modifying the primary domain or an additional domain
3. Find the domain you want to update in the list of domains and click on the Manage option
4. In the document root field, update the path to include the `/public` folder. For example:
    - If the current root is `/home/username/public_html`, change it to `/home/username/public_html/public`.
    - For addon domains, it might look like `/home/username/addon_domain/public`.
5. Save your changes

{% note %}
To view the latest information about managing domains with cPanel, you can view their [documentation page](https://docs.cpanel.net/cpanel/domains/domains/) about domains.
{% /note %}

### Updating the document root in Plesk

If your host provides Plesk for managing your site, you can set the document root for your website to point to Nova's `/public` folder with the following steps:

1. Log in to cPanel and find the Websites & Domains section
2. Find the domain you want to update and click on the Hosting Settings option
3. In the document root field, update the path to include the `/public` folder. For example:
    - If the current root is `/home/username/public_html`, change it to `/home/username/public_html/public`.
    - For addon domains, it might look like `/home/username/addon_domain/public`.
4. Save your changes

{% note %}
To view the latest information about managing domains with Plesk, you can view their [help page](https://support.plesk.com/hc/en-us/articles/12377087631255-How-to-change-the-document-root-for-a-single-domain-on-Plesk) about changing the document root for a single domain.
{% /note %}

## Installing Nova

To get started installing Nova, open your browser and navigate to your site. Nova should detect that it isn't installed and redirect you into the Setup Center.

### Check that Nova can run on your server

The first step of the install process is to verify that your server meets all of the [requirements](/docs/3.0/getting-started#prerequisites) to run Nova 3. If there's anything that does not pass, you'll be shown that information on the first screen of the setup process. If there are any failing checks, you'll need to work with your host to make the necessary changes and try again.

### Connect to your database

Nova comes with a web-based tool to setup your database connection. You'll be prompted to enter some information you should have received from your web host when setting up your account. Nova will use the credentials you provide to test the connection, and if successful, create the necessary configuration values for you.

If for some reason your server doesn't support creating files from a web script, the setup process will show you instructions on how to get the database credentials into the right place.

#### Explaining the Options

- __Username__ - The username used to connect to your database. This may or may not be the same as your FTP username, so if you don't know, contact your host.
- __Password__ - The password used to connect to your database. This may or may not be the same as your FTP password, so if you don't know, contact your host.
- __Database name__ - The name of the database you're trying to connect to and install Nova into. If you don't know the name of your database, contact your host.
- __Database table prefix__ - This is the word or initials that will prefix all table names. This helps to keep Nova's tables together and allows you to install other things in to the database without causing conflicts. If you are not planning to install anything else in the database, you can leave this blank.
- __Database host__ - This is where the database lives. 99% of the time, this will be `localhost` though if your host has a different setup, they may have sent you a different host name or an IP address to use. If you aren't sure about this, contact your host.
- __Database port__ - This is the port the database connects through. This will almost always be `3306`, but check with your host to ensure they don't have a different setup.
- __Database socket__ - This will most often be blank, but if your host requires a socket, you can provide that value here.

### Install Nova

Once you've finished connecting to your database, you'll be able to start by doing a fresh install of Nova 3 after entering the name of your game and selecting the genre that you want installed.

{% note %}
During the alpha and beta phases of Nova 3's development and testing, there will be an option for inserting demo data as part of the install process. This is a way to put some dummy data into Nova to help with playing around with it without needing to populate a bunch of information. If you choose to use demo data, you won't be prompted to create a user account and you'll log in to Nova using the email address `admin@admin.com` and the password `secret`.
{% /note %}

At this point, you can either choose to continue with a fresh install or migrate your existing Nova 2 data. If you want to migrate from Nova 2, you should follow the [Nova 2 migration guide](/docs/3.0/migrating-from-nova2). If you are installing Nova 3 fresh, there's one more step.

### Setup your account

The final step of installing Nova is to create your user account. Once you have entered your user account details, your account will be created, access roles will be assigned, and you will be signed in to Nova.

Congrats! You've installed Nova 3 and are on your way.
