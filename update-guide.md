---
title: Update guide
description: Updating Nova to the latest version.
layout: docs
section: Getting Started
---

{% note title="Before you start" %}
Make sure you backup both your files and database. While we don't anticipate any problems, if something does happen you'll be glad you have a recent backup of your site to restore from. Not sure how to do that? Check out our [guide](/docs/3.0/resources/backing-up-nova) on backing up Nova.
{% /note %}

## What you'll need

Before you get started updating Nova, make sure you have the following things ready to go:

- An FTP client for accessing your server
- The latest copy of Nova downloaded from the [Anodyne site](https://anodyne-productions.com) and unzipped
- A solid, recent backup of your site

## Updating Nova

### Step 1: Rename Nova

Once you've finished backing up your site (because you already did that, right?), rename the `nova` directory to `nova_backup` on the server.

### Step 2: Upload Nova

With the `nova` directory renamed on your server, you can now upload the new `nova` directory from the zip archive you downloaded from the Anodyne site. (This will give you the code for the latest version.)

### Step 3: Run the update

Navigate to `{your-site}/setup` in your browser and you'll be guided through the update process. Once the update process is complete, you'll be sent back to your site and will be ready to use Nova again.
