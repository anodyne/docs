---
title: Backing up Nova
description: Learn how to get a good backup of your site.
layout: docs
---

Learn how to get a good backup of your site. {% .lead %}

---

You'll constantly hear us harp on making sure to backup Nova before attempting to do anything with it, but how exactly *do* you backup Nova? It's actually a pretty simple process that you should go through regularly to ensure you have a recent backup in the event something goes wrong with your site. The last thing you want is to lose data and be unable to get your site back to a recent state it was in.

## Backing up the files

The first step to creating a solid backup is to save the Nova files off your server onto your device.

1. Connect to your server through your FTP program or cPanel file manager.
2. Create a folder on your device named `nova_backup_{date}`. We find that having the date in the name of your backup makes it quick and easy to restore the correct version if you need to.
3. Copy all of the files from the server to the folder your created on your device.

## Backing up the database

The database is easily the most important part of your Nova site. In order to backup your database, you'll need to access phpMyAdmin from cPanel. (Some web hosts will give you a direct link to phpMyAdmin while others will have you access it through cPanel.)

1. Log in to phpMyAdmin.
2. Click on the Export tab across the top of the page.
3. In the export box click on **Select All** and ensure the SQL option is selected.
4. In the options panel to the right ensure both structure and data checkboxes are checked.
5. Check the **Save as File** checkbox and then click Go.

It may take a few minutes, but phpMyAdmin will offer you a download of the entire database with the file extension `.sql`. Save the file in the backup folder you created along with all of the Nova files.

## Archiving the backup

Now that you have your complete backup, you can create a zip archive of your backup to save space on your device. Make sure to save the zip file in a safe place that you'll remember!

{% callout title="For some additional peace of mind" %}
Consider copying the zip archive of your backup to the cloud or a backup hard drive to ensure that even if something happens to your device, you still have your site backups available.
{% /callout %}
