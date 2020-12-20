# Installation

Learn how to get up and running with Nova 2.

---

## Upload Nova

To begin the installation, you need to upload the Nova 2 files up to your server. If you're not sure how to upload the files to your server, contact your host for help with this step of the process or do a Google search.

## Configure Nova

Before beginning the installation, you can choose to change any of Nova's configuration options in the config files located in the `app/config` directory. This is completely optional and Nova 2 will install fine without any changes to any files in the `config` directory.

## Setting Up the Database Connection

This is the part where everyone panics and says it's too complicated and difficult to get started. This is also the part where we prove you wrong.

Setting up your connection to the database is dead simple. All you need to do is open your browser and navigate to the location on your server where you uploaded the Nova files. If your server was __http://example.com__ and you uploaded Nova 2 to the root directory (often called `www` or `public_html`), then you'd navigate to __http://example.com__ and you'd be automatically redirected to the Config Setup page. From this page, you'll be able to tell Nova the information for connecting to your database and then Nova will 1) attempt to connect to the database and make sure it can, then 2) write that information to a connection file. Pretty easy, huh?

If for some reason your server doesn't support creating files from a web script, the setup process will show you the code to copy and paste into the database connection file.

### Explaining the Options

* __Database Name__ - The name of the database you're trying to connect to and install Nova to in to. If you don't know the name of your database, contact your host.
* __Username__ - The username used to connect to your database. This may or may not be the same as your FTP username, so if you don't know, contact your host.
* __Password__ - The password used to connect to your database. This may or may not be the same as your FTP password, so if you don't know, contact your host.
* __Database Host__ - This is where the database lives. 99% of the time, this will be _localhost_ though if your host has a different setup, they may have sent you a different host name. If you aren't sure about this, contact your host.
* __Table Prefix__ - This is the word or initials that will prefix all table names. This helps to keep Nova's tables together and allows you to install other things in to the database without causing conflicts. This is set to _nova\__ by default.

## Install the System

Once you've stepped through creating the config file, you'll be sent over to the Install Center where you'll be given all your available options for installing Nova 2. Select Fresh Install from the list and follow the prompts to install Nova 2 in to your database. The steps of the install process are as follows:

1. Create Nova database tables
2. Insert basic data into the tables
3. Create genre-specific tables and insert data into them
4. Set up your player account and the character name, rank and position of your primary character
5. Set up some basic system settings

## Post-Installation

At the end of the installation Nova will attempt to change several permissions in order to ensure all the backup and upload features work properly. It's possible that your host will have turned off the functions necessary to do this, so if you run in to any problems uploading to Nova, you'll need to change the file permissions on several directories to ensure they're writable (777). If you don't know how to change file permissions, contact your host. The following directories (and their sub-directories) need to be writable:

* `application/assets/images`
* `application/assets/backups`
* `application/cache`
* `application/logs`
