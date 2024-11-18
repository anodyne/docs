---
title: Configuration
description: Learn how to configure Nova 3.
layout: docs
section: Configuration
---

Either before beginning the installation or after finishing the installation, you can change any of Nova's configuration options in the config files located in the `application/config` directory.

## Web Server Configuration

### File Permissions

At the end of the install process Nova will attempt to change several permissions in order to ensure all the backup and upload features work properly. It's possible that your host will have turned off the functions necessary to do this, so if you run in to any problems uploading to Nova, you'll need to change the file permissions on several directories to ensure they're writable (777). If you don't know how to change file permissions, contact your host. The following directories (and their sub-directories) need to be writable:

- assets
- storage

### Pretty URLs
