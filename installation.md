---
title: Installing Nova 3
description: Learn how to get Nova 3 up and running.
layout: docs
section: Getting Started
---

{% note title="Looking to migrate your Nova 2 site to Nova 3?" %}
We’ve simplified the process of migrating from Nova 2, making it faster and easier than ever. After completing the Nova 3 installation, you’ll be prompted to choose between starting fresh or migrating your existing data. If you opt to migrate, follow the detailed steps in our [migration guide](/docs/3.0/migrating-from-nova2) to ensure a smooth transition.
{% /note %}

To get started, you’ll need to upload Nova's files to your server. You do this using:

- An FTP client (recommended for speed and ease of use), or
- Your hosting provider’s web-based server management tool, such as cPanel or Plesk.

If you’re unsure how to connect to your server or upload files, reach out to your web hosting provider for assistance. They’ll be able to guide you through the process.

## Updating the document root

### What is a document root?

The _document root_ is the main folder on a web server where it stores the files that visitors see when they access your website. For example, when someone visits https://example.com, the web server looks in the document root to find the file or page to display.

On many shared hosting services, the document root is a folder named `public_html`. Any files you place inside `public_html` can be accessed through a web browser. Files outside of `public_html` are hidden from visitors, which is useful for keeping sensitive information secure.

### Why does this matter for Nova 3?

Nova 3 has been designed with a secure file structure that separates the parts of your application that visitors can access from the parts they cannot. This structure ensures that sensitive files, such as configuration details or database settings, are stored safely out of reach from web browsers.

To make this work, Nova 3 uses a public folder as the document root. This folder contains only the files that need to be visible to the public, like images, JavaScript, and the main entry point for the application (`index.php`).

If you are installing Nova 3 or upgrading from Nova 2, you’ll need to update your web server’s document root to point to the `public` folder instead of the default document root (likely `public_html`). This small change helps protect your site and keeps sensitive files hidden from prying eyes.

{% note title="Note" %}
This process only needs to be completed once, either when installing Nova 3 for the first time or when migrating from Nova 2.
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

To start installing Nova, open your browser and navigate to your website. If Nova isn’t installed yet, it will automatically detect this and redirect you to the Setup Center to guide you through the installation process.

### Check that Nova can run on your server

The first step in the installation process is to ensure your server meets all the [requirements](/docs/3.0/getting-started#prerequisites) to run Nova 3. During setup, the system will perform a compatibility check and display the results on the first screen.

If any checks fail, you’ll see detailed information about what needs to be fixed. Work with your hosting provider to address these issues before proceeding with the installation. Once everything meets the requirements, you can continue the setup process.

### Connect to your database

Nova includes a user-friendly, web-based tool to help you set up your database connection. During the setup process, you’ll be prompted to enter the database credentials provided by your web host when you set up your account. Nova will use these credentials to test the connection. If the connection is successful, Nova will automatically configure the necessary settings for you.

If your server doesn’t allow web scripts to create files, the setup process will guide you with clear instructions on how to manually add the database credentials to the appropriate configuration file.

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
