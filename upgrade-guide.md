# Upgrade Guide

Upgrading Nova to the latest version.

---

:::note Before you start
Make sure you backup both your files and database. While we don't anticipate any problems, if something does happen you'll be glad you have a recent backup of your site to restore from. Not sure how to do that? Check out our [guide](/docs/3.0/backing-up-nova) on backing up Nova.
:::

## What you'll need

Before you get started updating Nova, make sure you have the following things ready to go:

- An FTP client for accessing your server
- The latest copy of Nova downloaded from the [Anodyne site](https://anodyne-productions.com) and unzipped
- A solid, recent backup of your site

## Updating Nova

### Step 1: Remove Nova

Once you've finished backing up your site (because you already did that, right?), delete the `nova` directory in its entirety from your server.

:::warning
Over the years we've seen countless problems with simply trying to overwrite the directory. The surest way to avoid those issues is to delete the directory and upload a new copy.
:::

### Step 2: Upload Nova

With the `nova` directory deleted from your server, you can now upload the `nova` directory from the zip archive you downloaded from the Anodyne site. (This will give you the code for the latest version.)

### Step 3: Run the update

Navigate to `{your-site}/update` in your browser and you'll be guided through the update process. Once the update process is complete, you'll be directed  back to your site and will be ready to use Nova again.

## Updating from previous versions

[wip]
