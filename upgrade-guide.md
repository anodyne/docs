# Upgrade Guide

Upgrading Nova to the latest version.

---

:::note Before you start
Make sure you backup both your files and database. While we don't anticipate any problems, if something does happen you'll be glad you have a recent backup of your site to restore from. Not sure how to do that? Check out our [guide](/docs/2.7/backing-up-nova) on backing up Nova.
:::

## What you'll need

Before you get started updating Nova, make sure you have the following things ready to go:

- An FTP client for accessing your server
- The latest copy of Nova downloaded from the [Anodyne site](https://anodyne-productions.com) and unzipped
- A solid, recent backup of your site

## Updating Nova

### Step 1: Rename the Nova directory

Once you've finished backing up your site (because you already did that, right?), rename the `nova` directory to `nova_backup` on your server. (This ensures that if the update goes awry you still have a copy of the working Nova core from before you attempted the update.)

:::warning
Over the years we've seen countless problems with simply trying to overwrite the directory. The surest way to avoid those issues is to rename the directory and upload a new copy.
:::

### Step 2: Upload Nova

With the `nova` directory renamed to `nova_backup`, you can now upload the `nova` directory from the zip archive you downloaded from the Anodyne site. (This will give you the code for the latest version.)

### Step 3: Run the update

Navigate to `{your-site}/index.php/update` in your browser and you'll be guided through the update process. Once the update process is complete, you'll be directed  back to your site and will be ready to use Nova again.

### Step 4: Remove the backup Nova directory

With the update complete and your site back up and running, you can now delete the `nova_backup` directory from your server.

## Updating from previous versions

Nova currently offers two stable releases for download, the latest current version and v2.3.2 for legacy systems. If you are updating from version 2.3.2 or higher to any version above, please follow all steps in **each** of the below upgrade guides. All files are provided for you in the latest current version download, but you will still need to walk through each version one at a time.

If you are upgrading from a version of Nova prior to 2.3.2, please reach out to our support team on [Discord](https://discord.gg/7WmKUks).

### Common issue with updating

If, when starting to update, your installer won't work, this may be because your database is not registering the correct version of your Nova install (or any version whatsoever). You can verify your version by logging into your Nova site, accessing Nova's control panel, and selecting **System & Versions** from the bottom of the page.

![System Versions](/images/docs/2.7/upgrade-guide/versions.png)

If your database version is `0.0.0` or otherwise doesn't match your Files Version, you may need to update your database to match the version of Nova you are upgrading from. In order to update that, you’ll need to login to your database with phpMyAdmin (via your web host's control panel).

1. Find the table `nova_system_info`.
2. Click **Edit** on the only row in the table.
3. Update `sys_version_major`, `sys_version_minor`, and `sys_version_update` to your Nova’s current version numbers.

For example, a site running Nova version 2.7.0 would read:

- `sys_version_major`: 2
- `sys_version_minor`: 7
- `sys_version_update`: 0

### v2.7 from v2.6.x

Nova 2.7 adds much improved PHP 7 and PHP 8 compatibility, but in order to do so, we've had to upgrade the underlying CodeIgniter framework from version 2 to version 3. This leads to an upgrade process with a couple of additional steps.

:::note
While Nova 2.7 is an optional update, we do recommend doing the upgrade. This release includes several database changes that will be required for any future migrations to Nova 3. Additionally, if your host is running PHP 7 or is planning to force upgrades to PHP 8, you will need to upgrade to Nova 2.7 for your site to continue working.
:::

#### Update the database config file

:::warning
It's important that you do this step first to ensure you can copy the database config file back into the config directory after the next step!
:::

The database config file found at `application/config/database.php` requires some updates to continue connecting properly to your database. **Note:** if a line is not marked in green or red in the code block below, you should leave it with its current value. (i.e. ensure you do not change the value on the username line).

```php
$active_group = 'default';
$active_record = true; // [tl! --]
$query_builder = true; // [tl! ++]

$db['default']['dsn'] = ''; // [tl! ++]
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'novauser';
$db['default']['password'] = 'novapass';
$db['default']['database'] = 'novadb';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = 'nova_';
$db['default']['pconnect'] = true; // [tl! --]
$db['default']['db_debug'] = NOVA_DB_DEBUG; // [tl! --]
$db['default']['pconnect'] = false; // [tl! ++]
$db['default']['db_debug'] = (ENVIRONMENT !== 'production'); // [tl! ++]
$db['default']['cache_on'] = false;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = true; // [tl! --]
$db['default']['encrypt'] = false; // [tl! ++]
$db['default']['compress'] = false; // [tl! ++]
$db['default']['stricton'] = false;
$db['default']['failover'] = []; // [tl! ++]
$db['default']['save_queries'] = true; // [tl! ++]
```

If you receive an error that says **Call to undefined function mysql_connect()**, you will also need to update the `dbdriver` from `mysql` to `mysqli`.

#### Update application files

Under normal circumstances, we don't ask Game Masters to update any files in the `application` directory. However, the update to CodeIgniter 3 required that many of the files in the the `application` directory be updated.

To start, rename the following directories:

- `config` to `config_backup`
- `controllers` to `controllers_backup`
- `core` to `core_backup`
- `libraries` to `libraries_backup`
- `models` to `models_backup`

With the directories renamed, you can upload the new copies of the following directories from the `application` directory in the Nova zip archive:

- `config`
- `controllers`
- `core`
- `libraries`
- `models`

The final piece of this step is to copy the `database.php` file from `config_backup` into `config` to ensure you can still connect to your database.

:::note
If you have made any modifications to any of the files inside these directories, you will need to re-apply the changes to the new versions of the files. **Do not** simply copy the old file back into the new directory as it could break things.
:::

#### Update the session driver

The way that sessions (data about the current visitor) are handled was completely re-written in CodeIgniter 3. Due to these changes, Nova 2.7 has to ship with the session driver set to `files` instead of `database`. There is no way around this due to how pervasive sessions are in web applications. Doing this prevents unrecoverable errors from happening the moment a user hits the site.

This change, however, prevents Nova from being able to easily pull who is currently online. In order to fix this issue, you will need to make a change to the main config file located at `application/config/config.php`. Around line 386, you'll need to make the following change:

```php
$config['sess_driver'] = 'files';  // [tl! -- **]
$config['sess_driver'] = 'database';  // [tl! ++ **]
$config['sess_cookie_name'] = 'ci_session';
$config['sess_samesite'] = 'Lax';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = 'sessions';
$config['sess_match_ip'] = false;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = false;
```

#### Update default skins (optional)

We've given both the Pulsar and Titan skins a much needed visual refresh. If you're using either skin and are happy with them, you don't need to do this step. If you'd like to use the updated versions, you can simply delete the `default` and `titan` directories from `application/views` and replace them with the versions in the Nova zip archive.

#### Remove backup copies of application directories

Once you've verified that everything is working correctly and you've successfully re-applied any changes to files in the directories you had to backup, you can safely remove the backup directories in the `application` folder.

### v2.6 from v2.5.x

Nova 2.6 introduced [Events](/docs/2.7/events) and [Extensions](/docs/2.7/extensions), two powerful features that unlock easier ways to modify a Nova site as well as several incredibly powerful ways to expand upon the base installation. In addition to following the normal update process, Nova 2.6 includes additional changes you’ll need to make for the new event and extension systems to work correctly.

#### Config file

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.7/master/application/config/extensions.php) into a new file called `extensions.php` and place it in the `application/config` directory on your server.

#### Helper

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.7/master/application/helpers/extension_helper.php) into a new file called `extension_helper.php` and place it in the `application/helpers` directory on your server.

#### Libraries

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.7/master/application/libraries/Extension.php) into a new file called `Extension.php` and place it in the `application/libraries` directory on your server. (Note: this filename is case-sensitive.)

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.7/master/application/libraries/Event.php) into a new file called `Event.php` and place it in the `application/libraries` directory on your server. (Note: this filename is case-sensitive.)

### v2.5 from v2.4.x

Nova 2.5 introduced easy ways to add privacy policies to your site, the ability for users to delete their own accounts and personal information, and some compatibility updates for PHP 7. In addition to following the normal update process, Nova 2.5 includes two additional changes that you’ll need to make.

#### Privacy policies

Nova 2.5 includes default privacy, cookie, do not track, and California privacy rights policies. Those policies are stored in Site Messages under the Messages tab. You can edit those as you see fit.

Any of the privacy policies can be enhanced with one of several variables available to them:

- `#sim_name#`: The name of the sim
- `#admin_email#`: The email addresses of any system admins
- `#hosting_company#`: The name of your hosting company, pulled from Site Settings
- `#access_log_purge#`: The timeframe of the access log purge, pulled from Site Settings

Finally, if you haven’t made any changes to the `default` or `titan` skins, you can replace those folders in `application/views` with the versions in the Nova 2.5 zip archive. Those skins include a link in the footer to the privacy policy page.

If you have made changes to those skins or have your own skins that need to be updated, you can add the following line anywhere in your template files to provide a link to the privacy policy pages:

```php
<?php echo anchor('main/policies', 'Privacy Policy');?>
```

:::note
You'll need to make this change in every skin and every template on your site.
:::

#### PHP 7 Update

If you have the ability to change the PHP version running on your server and decide to make the jump up to PHP 7, you’ll need to edit the `application/config/database.php` file to account for PHP’s removal of the `mysql` functions. You can do that by changing `$db['default']['dbdriver']` config item to be `mysqli`.

### v2.4 from v2.3.x

Nova 2.4 introduced some major changes to how Nova sends email to all players. In addition to following the normal update process, there's one additional change you'll need to make. In the zip archive you downloaded, you'll need to copy the `Mail.php` file from `application/libraries` to the `application/libraries` directory on your server. This will allow the new email class to work as expected.

### v2.3 from v1.0+

If you are upgrading from a version of Nova before 2.3.2, please reach out to our support team on [Discord](https://discord.gg/7WmKUks).
