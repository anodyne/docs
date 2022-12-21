---
title: Upgrading to Nova 2.7 from 2.6
description: Upgrading your site to Nova 2.7 from 2.6.
layout: docs
---

{% note title="Upgrading multiple versions" %}
This upgrade guide only covers the upgrade process from 2.6 to 2.7. If you are upgrading from a version prior to 2.6, please follow all previous upgrade instructions before starting this guide.
{% /note %}

The update process for moving to Nova 2.7 is a more involved and manual process than previous versions of Nova 2. Unfortunately this couldn't be avoided due to upgrading CodeIgniter (the underlying framework Nova is built on) to version 3. The process explained below only needs to happen one time when you first upgrade from any version prior to 2.7.0. After you've gone through this upgrade, any future updates will use the normal update process.

## Backing up your site

Make sure you backup both your files and database. While we don't anticipate any problems, if something does happen you'll be glad you have a recent backup of your site to restore from. Not sure how to do that? Check out our [guide](/docs/2.7/resources/backing-up-nova) on backing up Nova.

## What you'll need

Before you get started upgrading Nova, make sure you have the following things ready to go:

- An FTP client for accessing your server's file
- The latest copy of Nova downloaded from the [Anodyne site](https://anodyne-productions.com) and unzipped
- A recent backup of your site's files and database
- The database connection information you received from your web host (you can also find this is your current database config file)