# Installation

Learn how to get up and running with Nova 2.

---

## What you'll need

Before you start in earnest with the installation process, there are a few things you'll want to have handy:

- The server connection information you received from your web host
- The database connection information you received from your web host
- A copy of Nova downloaded from the [Anodyne website](https://anodyne-productions.com)

## Upload Nova

Remember when we mentioned grabbing an FTP client? Well here's where you'll put it to good use!

To get the installation process started we first need to make sure that all of Nova's files have been uploaded to the server. If you're not sure how to do that, you can either reference your FTP client's gude or reach out to your host for help with this step.

## Fresh Install

With your files uploaded to the server, all you need to do is navigate to your website address (let's call it `https://nova.space` for the sake of this guide). You should see the Install Center and an option to do a Fresh Install. If you click on that option, Nova will walk you through the installation process.

### Database Connection

The first step in the process is going to be setting up a connection to the database that will house all of the data you put into your site. You can simply enter the information that your host gave you about your database and move on to the next step. Nova will verify it can connect to the database and then create a file on the server that securely holds your database credentials so it can continue to connect.

Every once in a while, a server won't have everything turned on that Nova needs to create the database credentials file. That's okay. If Nova can't create the file, you'll be shown a screen that will give you instructions on how to manually create the file and what to put in the file.

### Installing Nova

Once Nova can connect to your database, it can go through the process of creating everything it needs in the database for Nova to run. First, it'll create the tables and insert some basic data to get your started, then it will insert any of the genre-specific information (which is based on which genre you selected when you downloaded Nova from the Anodyne website).

### Your Account

Now that Nova is installed, it's time to create your user account and the character that will be linked to your account. This is only the essential information needed to create your account and biography, you'll be able to add more details after the installation is complete.

### System Settings

The final step in the installation process is to update a few key system settings. You'll be able to change any of these settings later on, so nothing is set in stone.

## File Permissions

It's a little technical, but at the end of the installation process Nova will attempt to change some file permissions in order to ensure all of Nova's backup and upload features work properly. In some cases, the ability to do that may not be avaiable. If that happens and you notice strange errors or things not working the way you expect, you'll need to change the file permissions yourself. If you're not sure how to do this, your web host can help you change the permissions on several directories.

In order for all the permissions to work as expected, you'll need to make sure the following directories (and their sub-directories) are writable (777... your host will know what that means):

- `application/assets/images`
- `application/assets/backups`
- `application/cache`
- `application/logs`