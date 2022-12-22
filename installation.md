---
title: Installation
description: Learn how to get up and running with Nova 2.
layout: docs
---

## What you'll need

Before you start with the installation process, there are a few things you'll want to make sure you have handy to expedite the installation process:

- The server connection information you received from your web host
- The database connection information you received from your web host
- A copy of Nova downloaded from the [Anodyne website](https://anodyne-productions.com)

## Upload Nova

Remember when [we mentioned](/docs/2.7/before-getting-started#ftp-client) grabbing an FTP client? Well here's your chance to put it to good use!

To get the installation process started you'll first need to make sure all of Nova's files have been uploaded to the server. If you're not sure how to do that, you can either reference your FTP client's documentation or reach out to your web host for help with this step.

{% note title="Avoiding long URLs" %}
We recommend unzipping the Nova archive on your computer and then uploading the contents to the root of your site. This prevents situations where you have something like `nova-2.7.0` in the URL of your site.
{% /note %}

## Fresh install

With Nova's files uploaded to the server, all you need to do now is fire up your [favorite browser](/docs/2.7/requirements#browser) and navigate to your website (let's call it `https://nova.space` for the sake of this guide). You should see the Install Center and an option to do a Fresh Install. If you click on that option, Nova will walk you through the installation process.

### Database connection

The first step in the install process is going to be setting up a connection to the database that will hold all of the data you put into your site. You can simply enter the information that your host gave you about your database and move on to the next step. Nova will verify it can connect to the database and then create a file on the server that securely holds your database credentials so it can continue to connect whenever it needs to.

{% note title="Missing server features" %}
Every once in a while, a server won't have everything turned on that Nova needs to create the database credentials file. That's okay. If Nova can't create the database connection file, you'll be shown a screen that will give you instructions on how to manually create the file, where to upload it to, and what to put in the file.
{% /note %}

### Installing Nova

Once Nova can connect to your database, it can finish the process of creating everything it needs in the database for Nova to run. The first step is to create all of the database tables Nova will need and insert some basic data to get your started. After that's finished Nova will insert any genre-specific information it needs for your site (which is based on which genre you selected when you downloaded Nova from the Anodyne website).

### Your account

Now that Nova is installed, it's time to create your user account and the character that will be linked to your account. This is only the essential information needed to create your account and biography, you'll be able to add more details after the installation is complete.

### System settings

The final step in the installation process is to update a few key system settings. Like your user and character information, you'll be able to change any of these settings after the installation is complete.

## File permissions

It's a little technical, but at the end of the installation process Nova will attempt to change some file permissions in order to ensure all of Nova's backup and upload features work properly. In some cases, the ability to do that may not be available on the server. If that happens and you notice strange errors or things not working the way you expect, you'll need to change the file permissions yourself. If you're not sure how to do this, your web host can help you change the permissions on several directories.

In order for all the permissions to work as expected, you'll need to make sure the following directories (and their sub-directories) are writable (777... your host will know what that means):

- `application/assets/images`
- `application/assets/backups`
- `application/cache`
- `application/logs`
