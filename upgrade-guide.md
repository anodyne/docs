# Upgrade Guide

---

## Backup

Before attempting to update, please make sure you backup both your files and database. While we don't anticipate any problems, if something does happen, you'll have a solid backup of your system to fall back to.

There's always a lot of talking about making sure to back up Nova before attempting to update it or upgrade from SMS. So how exactly do you backup Nova? Creating a backup is pretty straightforward. Before you attempt to update Nova, you should create a backup of your system in the event something goes wrong. The last thing you want is to lose data and be out of luck.

### Files

The first step to creating a solid backup is to save the Nova files off your server to your computer. To do that, you'll need to have an FTP program to connect to the server. Once you've connected to your account with the username, password and location your host gave to you when your account was created, you can download the files. The best way of going about this is to create a folder on your Desktop called `nova_backup` and to copy all the files directly over to that folder. Make sure you get all the files! Once you have all the files, you can disconnect from the server and close your FTP program.

### Database

The database is the most important part of the system. In order to backup your database, you'll need to access phpMyAdmin. On some hosts, you would've been given a direct link to phpMyAdmin and on others, you'll have access to it through cPanel. Once you've logged in to phpMyAdmin, make sure you've selected the database with your Nova tables. You'll know you're in the right place if you see a full list of all the Nova tables. Click on the Export tab across the top of the page.

In the export box, click Select All and make sure the SQL option is selected below. In the Options box to the right, make sure both Structure and Data checkboxes are checked. Finally, click the Save as File checkbox then Go. The system will offer you a download of the SQL database. Save the file to your `nova_backup` folder on your Desktop.

### Archive

Now that you have your complete backup, you should zip your backup up into a zip archive and name it `nova_backup_{date}` where `{date}` is today's date. Make sure you save the zip file in a safe place in case you need to get at it.

## Remove

Once you've finished backing up all of your stuff, delete the `nova` directory in its entirety.

When we say delete, we mean it. Delete the directory and then upload the new copy.

## Upload

With the `nova` directory deleted, upload the new `nova` directory from the zip archive you downloaded from the Anodyne site to your site.

## Update

The first step will try to do an automatic backup for you, but you don't have to worry about that too much since you manually backed up everything before you started. (You did back up everything before you started, right?)

Let the update process do its thing and when you're done, you'll be back on the front Nova page and ready to use Nova again.

## New Extensions System

In addition to following the normal update process, Nova 2.6 includes additional changes you’ll need to make for the new event and extension systems to work correctly.

### Config File

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/config/extensions.php) into a new file called `extensions.php` and place it in the `application/config` directory on your server.

### Helper

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/helpers/extension_helper.php) into a new file called `extension_helper.php` and place it in the `application/helpers` directory on your server.

### Libraries

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/libraries/Extension.php) into a new file called `Extension.php` and place it in the `application/libraries` directory on your server. (Note: this filename is case-sensitive.)

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/libraries/Event.php) into a new file called `Event.php` and place it in the `application/libraries` directory on your server. (Note: this filename is case-sensitive.)