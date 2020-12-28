# Upgrade Guide

Upgrading Nova to the latest version.

---

<x-docs.alert title="Before you start">Make sure you backup both your files and database. While we don't anticipate any problems, if something does happen you'll be glad you have a recent backup of your site to restore from. Not sure how to do that? Check out our <a href="/docs/2.6/backing-up-nova">guide</a> on backing up Nova.</x-docs.alert>

## What you'll need

Before you get started updating Nova, make sure you have the following things ready to go:

- An FTP client for accessing your server
- The latest copy of Nova downloaded from the [Anodyne site](https://anodyne-productions.com)
- A solid, recent backup of your site

## Updating Nova

### Step 1: Remove Nova

Once you've finished backing up your site (because you already did that, right?), delete the `nova` directory in its entirety from your server.

<x-docs.alert color="red" title="When we say delete...">Over the years we've seen countless problems with simply trying to overwrite the directory. The surest way to avoid those issues is to delete the directory and upload a new copy.</x-docs.alert>

### Step 2: Upload Nova

With the `nova` directory deleted, you can now upload the new `nova` directory from the zip archive you downloaded from the Anodyne site.

### Step 3: Run the update

The first step will try to do an automatic backup for you, but you don't have to worry about that too much since you manually backed up everything before you started. (You did back up everything before you started, right?)

Let the update process do its thing and when you're done, you'll be back on the front Nova page and ready to use Nova again.

## Updating from previous versions

Nova currently offers two stable releases for download, version 2.6.1 (the latest) and 2.3.2 (legacy). If you are updating from version 2.3.2 to any version above, please follow the version-specific guide below. If you are upgrading from a version of Nova that is before 2.3.2, please reach out to our support team on [Discord](https://discord.gg/7WmKUks).

If you are upgrading from 2.3.2 to 2.6.1, please follow all steps in each of the below upgrade guides. All files are provided for you in the 2.6.1 installer package, but you will still need to walk through each version one at a time.

### Common issue with updating

If, when starting to update, your installer won't work, this may be because your database is not registering the correct version of your Nova install (or any version whatsoever). You can verify your version by logging into your Nova site, accessing Nova's control panel, and selecting **System & Versions** from the bottom of the page.

![System Versions](/images/docs/2.6/upgrade-guide/versions.png)

If your database version is `0.0.0` or otherwise doesn't match your Files Version, you may need to update your database to match the version of Nova you are upgrading from. In order to update that, you’ll need to login to your database with phpMyAdmin (via your web host's control panel).

1. Find the table `nova_system_info`.
2. Click **Edit** on the only row in the table.
3. Update `sys_version_major`, `sys_version_minor`, and `sys_version_update` to your Nova’s current version numbers.

For example, a site running Nova version 2.3.2 would read:

- `sys_version_major`: 2
- `sys_version_minor`: 3
- `sys_version_update`: 2

### 2.6 from 2.5.x

Nova 2.6 introduced [Events](/docs/2.6/events) and [Extensions](/docs/2.6/extensions), two powerful features that unlock easier ways to modify a Nova site as well as several incredibly powerful ways to expand upon the base installation. In addition to following the normal update process, Nova 2.6 includes additional changes you’ll need to make for the new event and extension systems to work correctly.

#### Config File

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/config/extensions.php) into a new file called `extensions.php` and place it in the `application/config` directory on your server.

#### Helper

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/helpers/extension_helper.php) into a new file called `extension_helper.php` and place it in the `application/helpers` directory on your server.

#### Libraries

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/libraries/Extension.php) into a new file called `Extension.php` and place it in the `application/libraries` directory on your server. (Note: this filename is case-sensitive.)

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/libraries/Event.php) into a new file called `Event.php` and place it in the `application/libraries` directory on your server. (Note: this filename is case-sensitive.)

### 2.5 from 2.4.x

Nova 2.5 introduced easy ways to add privacy policies to your site, the ability for users to delete their own accounts and personal information, and some compatibility updates for PHP 7. In addition to following the normal update process, Nova 2.5 includes two additional changes that you’ll need to make.

#### Privacy Policies

Nova 2.5 includes default privacy, cookie, do not track, and California privacy rights policies. Those policies are stored in Site Messages under the Messages tab. You can edit those as you see fit.

Any of the privacy policies can be enhanced with one of several variables available to them:

- `#sim_name#`: The name of the sim
- `#admin_email#`: The email addresses of any system admins
- `#hosting_company#`: The name of your hosting company, pulled from Site Settings
- `#access_log_purge#`: The timeframe of the access log purge, pulled from Site Settings

Finally, if you haven’t made any changes to the `default` or `titan` skins, you can replace those folders in `application/views` with the versions in the Nova 2.5 zip archive. Those skins include a link in the footer to the privacy policy page.

If you have made changes to those skins or have your own skins that need to be updated, you can add the following line anywhere in your template files to provide a link to the privacy policy pages:

`&lt;?php echo anchor('main/policies', 'Privacy Policy'); ?>`

<x-docs.alert>You'll need to make this change in every skin and every template on your site.</x-docs.alert>

#### PHP 7 Update

If you have the ability to change the PHP version running on your server and decide to make the jump up to PHP 7, you’ll need to edit the `application/config/database.php` file to account for PHP’s removal of the `mysql` functions. You can do that by changing `$db['default']['dbdriver']` config item to be `mysqli`.

### 2.4 from 2.3.x

Nova 2.4 introduced some major changes to how Nova sends email to all players. In addition to following the normal update process, there's one additional change you'll need to make. In the zip archive you downloaded, you'll need to copy the `Mail.php` file from `application/libraries` to the `application/libraries` directory on your server. This will allow the new email class to work as expected.

### 2.3 from any previous version

If you are upgrading from a version of Nova before 2.3.2, please reach out to our support team on [Discord](https://discord.gg/7WmKUks).
