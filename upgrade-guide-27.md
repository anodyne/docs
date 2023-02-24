---
title: Upgrading to Nova 2.7
description: Upgrading your site to Nova 2.7.
layout: docs
section: Getting Started
---

The update process for moving to Nova 2.7 is a more involved and manual process than previous versions of Nova 2. Unfortunately this couldn't be avoided due to upgrading CodeIgniter (the underlying framework Nova is built on) to version 3. The process explained below only needs to happen one time when you first upgrade from any version prior to 2.7.0. After you've gone through this upgrade, any future updates will use the normal update process.

{% note title="Before you start" %}
Make sure you backup both your files and database. While we don't anticipate any problems, if something does happen you'll be glad you have a recent backup of your site to restore from. Not sure how to do that? Check out our [guide](/docs/2.7/resources/backing-up-nova) on backing up Nova.
{% /note %}

## What you'll need

Before you get started updating Nova, make sure you have the following things ready to go:

- An FTP client for accessing your server
- The latest copy of Nova downloaded from the [Anodyne site](https://anodyne-productions.com) and unzipped
- A solid, recent backup of your site
- The database connection information you received from your web host (you can also find this is your current database config file)

## Updating Nova

{% warning title="A word about PHP versions" %}
Nova 2.7 provides support for PHP 8, but previous versions of Nova will not work on PHP 8. In order to update to Nova 2.7, you will need to make sure your site is running on PHP 7.4. After the update is complete and your site is running Nova 2.7, you can freely upgrade to whatever version of PHP 8 you would like to.
{% /warning %}

### Step 1: Update application files

Under normal circumstances, we don't ask Game Masters to update any files in the `application` directory. However, the update to CodeIgniter 3 required that many of the files in the the `application` directory be updated.

To start, rename the following directories in the `application` directory:

- `config` to `config_backup`
- `controllers` to `controllers_backup`
- `core` to `core_backup`
- `libraries` to `libraries_backup`
- `models` to `models_backup`

Next, rename the following files at the root directory:

- `index.php` to `index_backup.php`
- `message.php` to `message_backup.php`

With the directories and files renamed, you can now upload the new copies of the following directories from the `application` directory in the Nova zip archive to your own `application` directory:

- `config`
- `controllers`
- `core`
- `libraries`
- `models`

Next, you can upload the following files from the Nova zip archive to your own root directory:

- `index.php`
- `message.php`

{% note title="A note about previous modifications" %}
If you have made any modifications to any of the files inside these directories, you will need to re-apply the changes to the new versions of the files. **Do not** simply copy the old file back into the new directory as it could break things.
{% /note %}

{% warning %}
**Do not** copy the `database.php` file back into the config directory. Going through this guide will prompt you to enter your database credentials and re-create the database config file.
{% /warning %}

### Step 2: Rename the Nova directory

Once you've finished backing up your site (because you already did that, right?), rename the `nova` directory to `nova_backup` on your server. (This ensures that if the update goes awry you still have a copy of the working Nova core from before you attempted the update.)

{% warning title="Rename, don't overwrite" %}
Over the years we've seen countless problems with simply trying to overwrite the directory. The surest way to avoid those issues is to rename the directory and upload a new copy.
{% /warning %}

### Step 3: Upload Nova

With the `nova` directory renamed to `nova_backup`, you can now upload the `nova` directory from the zip archive you downloaded from the Anodyne site. (This will give you the code for the latest version.)

{% note title="You may be redirected" %}
**Note:** if you navigate to your main site after uploading the new files, you will be redirected to the URL: `message.php?type=nova27`. This page will tell you that an update is required. We've done this to avoid Nova throwing an error due to some of the changes that were made. This is expected behavior. Clicking the button on that page will take you to the update process.
{% /note %}

### Step 4: Run the update

Navigate to `{your-site}/index.php/install` in your browser and you'll be guided through the update process. For this update, you'll be prompted to configure your database connection again. After completing the database config file wizard, you'll be able to run the update. Once the update process is complete, you'll be directed back to your site and will be ready to use Nova again.

### Step 5: Update the Sendmail path

The way that sessions (data about the current visitor) are handled was completely re-written in CodeIgniter 3. Due to these changes, Nova 2.7 has to ship with the session driver set to `files` instead of `database`. There is no way around this due to how pervasive sessions are in web applications. Doing this prevents unrecoverable errors from happening the moment a user hits the site.

This change, however, prevents Nova from being able to easily pull who is currently online. In order to fix this issue, you will need to make a change to the main config file located at `application/config/config.php`. Add the below line at the end of the file to change the session driver from files to database:

```php
$config['sess_driver'] = 'database';  // [tl! ++ **]
$config['mailpath'] = '/usr/sbin/sendmail';
$config['mailpath'] = '/usr/sbin/sendmail -t -i';
```

### Step 6: Update the session driver

The way that sessions (data about the current visitor) are handled was completely re-written in CodeIgniter 3. Due to these changes, Nova 2.7 has to ship with the session driver set to `files` instead of `database`. There is no way around this due to how pervasive sessions are in web applications. Doing this prevents unrecoverable errors from happening the moment a user hits the site.

This change, however, prevents Nova from being able to easily pull who is currently online. In order to fix this issue, you will need to make a change to the main config file located at `application/config/config.php`. Add the below line at the end of the file to change the session driver from files to database:

```php
$config['sess_driver'] = 'database';  // [tl! ++ **]
```

### Step 7: Remove the backup directories

With the update complete and your site back up and running, you can now delete the `nova_backup` directory from your server as well as all of the backup directories in your `application` folder.

{% note %}
Of course it goes without saying, don't delete anything that you may need to access later. If you're not sure, you can always download the directories to your computer for safe keeping.
{% /note %}

### Step 8: Update default skins (optional)

We've given both the Pulsar and Titan skins a much needed visual refresh. If you're using either skin and are happy with them, you don't need to replace them, but if you'd like to use the updated versions, you can delete the `default` and `titan` directories from `application/views` and replace them with the versions in the Nova zip archive.

{% note title="A note about existing skins" %}
We've done everything we can to limit any impact to existing skins with this release. Even still, there have been changes to core files that could cause small spacing issues on some pages.
{% /note %}
