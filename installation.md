# Installation

- [Installation](#installation)
    - [Server Requirements](#server-requirements)
    - [Installing Nova](#installing-nova)
    - [Configuration](#configuration)
- [Web Server Configuration](#web-server-configuration)
    - [File Permissions](#file-permissions)
    - [Pretty URLs](#pretty-urls)

## Installation {#installation}

### Server Requirements {#server-requirements}

We've worked hard to make sure Nova's requirements are as broad as possible so as many people as possible can use it for their games. Still, there are a few requirements that you should verify before installing Nova 2. In the event the server you're going to be installing Nova on doesn't support some or all of these things, you should contact your hosting provider and ask them about the possibility of upgrading these items.

<div class="content-list" markdown="1">
- PHP >= 5.3.0
- MySQL >= 4.1
</div>

### Installing Nova {#installing-nova}

#### Upload Nova

To begin installing Nova 2, you'll need to upload Nova's files to your server. If you're not sure how to upload files to your server, contact your host for help with this step of the process.

#### Setup the Database Connection

Nova comes with a web-based tool to setup your database connection. You'll be prompted to enter some information you should have received from your host when setting up your account and Nova will create the necessary configuration file for you.

If for some reason your server doesn't support creating files from a web script, the setup process will show you the code to copy and paste into the database connection file.

##### Explaining the Options

- __Database Name__ - The name of the database you're trying to connect to and install Nova into. If you don't know the name of your database, contact your host.
- __Username__ - The username used to connect to your database. This may or may not be the same as your FTP username, so if you don't know, contact your host.
- __Password__ - The password used to connect to your database. This may or may not be the same as your FTP password, so if you don't know, contact your host.
- __Database Host__ - This is where the database lives. 99% of the time, this will be `localhost` though if your host has a different setup, they may have sent you a different host name. If you aren't sure about this, contact your host.
- __Table Prefix__ - This is the word or initials that will prefix all table names. This helps to keep Nova's tables together and allows you to install other things in to the database without causing conflicts. This is set to `nova_` by default.

#### Install Nova

Once you've finished creating the database config file, you'll be sent over to the Install Center where you'll be given all your available options for installing Nova 2. Select __Fresh Install__ from the list and follow the prompts to install Nova 2.

### Configuration {#configuration}

Either before beginning the installation or after finishing the installation, you can change any of Nova's configuration options in the config files located in the `application/config` directory.

## Web Server Configuration {#web-server-configuration}

### File Permissions {#file-permissions}

At the end of the install process Nova will attempt to change several permissions in order to ensure all the backup and upload features work properly. It's possible that your host will have turned off the functions necessary to do this, so if you run in to any problems uploading to Nova, you'll need to change the file permissions on several directories to ensure they're writable (777). If you don't know how to change file permissions, contact your host. The following directories (and their sub-directories) need to be writable:

<div class="content-list" markdown="1">
- application/assets/images
- application/assets/backups
- application/cache
- application/logs
</div>

### Pretty URLs {#pretty-urls}

#### Update CodeIgniter

To begin, you'll need to update Nova's config to ensure that any links won't include `index.php` in them. Copy the code below and paste it into `application/config/config.php` below the `require_once` line.

```.language-php
$config['index_page'] = "";
```

Save the file and ensure it's been uploaded back up to your server.

#### Apache

If your site is on a server running Apache, you'll need to check with your host and ensure that the `mod_rewrite` module is enabled so the `.htaccess` file will be honored by the server.

You can then create a file named `.htaccess` (the period at the beginning is important) and paste the following code in:

```.language-apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
    # Leave 'RewriteBase /' if not installing into subfolder
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?/$1 [L]
</IfModule>

<IfModule !mod_rewrite.c>
    # If we don't have mod_rewrite installed, all 404's
    # can be sent to index.php, and everything works as normal.
    # Submitted by: ElliotHaughin

    ErrorDocument 404 /index.php
</IfModule>
```

#### Nginx

If your site is on a server running Nginx, the following directive in your site configuration will direct all requests to the `index.php` front controller:

```.language-nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```