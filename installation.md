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

Nova 3 uses a more secure file structure to ensure visitors cannot access core files and that only what's necessary for serving the site is sent to / available in the browser. As a result of this change, your site's document root needs to be updated to point to the `public` folder that comes with Nova 3. This process only needs to be done once when you first install Nova 3 or migrate from Nova 2.

### cPanel

If your host has provided cPanel to manage the server, you'll find the document root setting on the domains page.

1. Find the domain that you are installing / migrating for on the domains page and click the manage button
2. Update the document root and ensure that it ends with `/public` (there should be a single leading slash before "public")
3. Click the update button

{% note %}
To view the latest information about managing domains with cPanel, you can view their [documentation page](https://docs.cpanel.net/cpanel/domains/domains/) about domains.
{% /note %}

### Plesk

If your host has provided Plesk to manage the server, you'll find the document root setting in the Hosting Settings on the domains page.

1. Find the domain that you are installing / migrating for from the Domains page and click the Hosting Settings button
2. Update the document root and ensure that it ends with `/public` (there should be a single leading slash before "public")
3. Click the OK button

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
