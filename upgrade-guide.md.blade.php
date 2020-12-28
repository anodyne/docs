# Upgrade Guide

---

<x-docs.alert title="Before you start">Make sure you backup both your files and database. While we don't anticipate any problems, if something does happen you'll be glad you have a solid backup of your site to restore from.</x-docs.alert>

## Backup

There's always a lot of talking about making sure to back up Nova before attempting to update it or upgrade from SMS. So how exactly do you backup Nova? Creating a backup is pretty straightforward. Before you attempt to update Nova, you should create a backup of your system in the event something goes wrong. The last thing you want is to lose data and be out of luck.

### Files

The first step to creating a solid backup is to save the Nova files off your server to your computer. To do that, you'll need to have an FTP program to connect to the server. Once you've connected to your account with the username, password and location your host gave to you when your account was created, you can download the files. The best way of going about this is to create a folder on your Desktop called `nova_backup` and to copy all the files directly over to that folder. Make sure you get all the files! Once you have all the files, you can disconnect from the server and close your FTP program.

### Database

The database is the most important part of the system. In order to backup your database, you'll need to access **phpMyAdmin**. On some hosts, you would've been given a direct link to phpMyAdmin and on others, you'll have access to it through software such as **cPanel** or **Plesk**. Once you've logged in to phpMyAdmin, make sure you've selected the database with your Nova tables. You'll know you're in the right place if you see a full list of all the Nova tables. Click on the Export tab across the top of the page.

In the export box, click Select All and make sure the SQL option is selected below. In the Options box to the right, make sure both Structure and Data checkboxes are checked. Finally, click the Save as File checkbox then Go. The system will offer you a download of the SQL database. Save the file to your `nova_backup` folder on your Desktop.

### Archive

Now that you have your complete backup, you should zip your backup up into a zip archive and name it `nova_backup_{date}` where `{date}` is today's date. Make sure you save the zip file in a safe place in case you need to get at it.

## Remove

Once you've finished backing up all of your stuff, delete the `nova` directory in its entirety.

<x-docs.alert color="red" title="When we say delete...">Over the years we've seen countless problems with simply trying to overwrite the directory. The surest way to avoid those issues is to delete the directory and upload a new copy.</x-docs.alert>

## Upload

With the `nova` directory deleted, upload the new `nova` directory from the zip archive you downloaded from the Anodyne site to your site.

## Update

The first step will try to do an automatic backup for you, but you don't have to worry about that too much since you manually backed up everything before you started. (You did back up everything before you started, right?)

Let the update process do its thing and when you're done, you'll be back on the front Nova page and ready to use Nova again.

## Updating from previous versions

Nova currently offers two stable releases for download, version 2.6.1 (the latest) and 2.3.2 (legacy). If you are updating from version 2.3.2 to any version above, please follow the version-specific guide below. If you are upgrading from a version of Nova that is before 2.3.2, please reach out to our support team on [Discord](https://discord.gg/7WmKUks).

If you are upgrading from 2.3.2 to 2.6.1, please follow all steps in each of the below upgrade guides. All files are provided for you in the 2.6.1 installer package, but you will still need to walk through each version one at a time.

### Common issue with updating

If, when starting to update, your installer won't work, this may be because your database is not registering the correct version of your Nova install (or any version whatsoever). You can verify your version by logging into your Nova site, accessing Nova's control panel, and selecting **System & Versions** from the bottom of the page.
![System Versions](/images/docs/2.6/upgrade-guide/versions.png)

If your database version is `0.0.0` or otherwise doesn't match your Files Version, you may need to update your database to match the version of Nova you are upgrading from. You’ll need to login to your Nova’s database (via your webhost's control panel), and locate **phpMyAdmin** to access the database.

1. Find the table `nova_system_values`.
2. Click **Edit** on the only row in the table.
3. Update `sys_version_major`, `sys_version_minor`, and `sys_version_update` to your Nova’s current install.

For example, a site running Nova version 2.3.2 would read:
`sys_version_major`  : 2
`sys_version_minor`  : 3
`sys_version_update` : 2

### 2.5.x to 2.6.x

Nova 2.6.0 introduced **Events** and **Extensions**, two powerful features that unlock easier ways to modify a Nova site, as well as several incredibly powerful ways to expand upon the base installation. In addition to following the normal update process, Nova 2.6 includes additional changes you’ll need to make for the new event and extension systems to work correctly.

#### Config File

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/config/extensions.php) into a new file called `extensions.php` and place it in the `application/config` directory on your server.

#### Helper

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/helpers/extension_helper.php) into a new file called `extension_helper.php` and place it in the `application/helpers` directory on your server.

#### Libraries

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/libraries/Extension.php) into a new file called `Extension.php` and place it in the `application/libraries` directory on your server. (Note: this filename is case-sensitive.)

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/libraries/Event.php) into a new file called `Event.php` and place it in the `application/libraries` directory on your server. (Note: this filename is case-sensitive.)

### 2.4.x to 2.5.x

Nova 2.5.0 introduced easy ways to add **Privacy Policies** to your site, the ability for users to **delete** their own accounts and personal information, and compatibility updates for *PHP 7*. In addition to following the normal update process, Nova 2.5 includes potentially two additional changes that you’ll need to make.

#### Privacy Policies

Nova 2.5 includes default privacy, cookie, do not track, and California privacy rights policies. Those policies are stored in Site Messages under the Messages tab. You can edit those as you see fit.

Any of the privacy policies can be enhanced with one of several variables available to them:

- `#sim_name#` - The name of the sim
- `#admin_email#` - The email addresses of any system admins
- `#hosting_company#` - The name of your hosting company, pulled from Site Settings
- `#access_log_purge#` - The timeframe of the access log purge, pulled from Site Settings

Finally, if you haven’t made any changes to the **default** or **titan** skins, you can replace those folders in `application/views` with the versions in the Nova 2.5 zip archive. Those skins include a link in the footer to the privacy policy page.

If you have made changes to those skins or have your own skins that need, you can add the following line anywhere in your template files to provide a link to the privacy policy pages:

`&lt;?php echo anchor('main/policies', 'Privacy Policy'); ?>`

You will need to make this change in every skin and every template on your site!

#### PHP 7 Update

If you have the ability to change the PHP version running on your server and decide to make the jump up to PHP 7, you’ll need to edit the `application/config/database.php` file to account for PHP’s removal of the `mysql` functions. You can do that by changing `$db['default']['dbdriver']` config item to be **mysqli**.

### 2.3.x to 2.4.x

Nova 2.4.0 introduced some very major fixes to how Nova sends email to all players on a game. In addition to following the routine steps for updating Nova, with the changes to Nova 2.4, there's one additional change that will need to be made. In the zip archive you download, you'll need to copy the `Mail.php` file from `application/libraries` to the `application/libraries` directory on your server. This will allow the new email class to work as expected.

### 1.0.0+ to 2.3.2

If you are upgrading from a version of Nova that is before 2.3.2, please reach out to our support team on [Discord](https://discord.gg/7WmKUks).
