# Upgrade Guide

- [Upgrade](#upgrade)
    - [Backup](#backup)
    - [Remove](#remove)
    - [Upload](#upload)
    - [Update](#update)
- [New Extensions System](#new-extensions-system)
    - [Config File](#config-file)
    - [Helper](#helper)
    - [Libraries](#libraries)

<a name="upgrade"></a>
## Upgrade

<a name="backup"></a>
### Backup

Before attempting to update, please make sure you backup both your files and database. While we don't anticipate any problems, if something does happen, you'll have a solid backup of your system to fall back to.

<a name="remove"></a>
### Remove

Once you've finished backing up all of your stuff, delete the `nova` directory in its entirety.

When we say delete, we mean it. Delete the directory and then upload the new copy.

<a name="upload"></a>
### Upload

With the `nova` directory deleted, upload the new `nova` directory from the zip archive you downloaded from the Anodyne site to your site.

<a name="update"></a>
### Update

The first step will try to do an automatic backup for you, but you don't have to worry about that too much since you manually backed up everything before you started. (You did back up everything before you started, right?)

Let the update process do its thing and when you're done, you'll be back on the front Nova page and ready to use Nova again.

<a name="new-extensions-system"></a>
## New Extensions System

In addition to following the normal update process, Nova 2.6 includes additional changes you’ll need to make for the new event and extension systems to work correctly.

<a name="config-file"></a>
### Config File

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/config/extensions.php) into a new file called `extensions.php` and place it in the `application/config` directory on your server.

<a name="helper"></a>
### Helper

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/helpers/extension_helper.php) into a new file called `extension_helper.php` and place it in the `application/helpers` directory on your server.

<a name="libraries"></a>
### Libraries

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/libraries/Extension.php) into a new file called `Extension.php` and place it in the `application/libraries` directory on your server. (Note: this filename is case-sensitive.)

Copy the contents of [this file](https://raw.githubusercontent.com/anodyne/nova/2.6/master/application/libraries/Event.php) into a new file called `Event.php` and place it in the `application/libraries` directory on your server. (Note: this filename is case-sensitive.)