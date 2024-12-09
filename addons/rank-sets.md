---
title: Rank set add-ons
description: Get started with building rank set add-ons for Nova.
layout: docs
section: Add-ons
---

A rank set add-on is a type of add-on that allows authors to package up rank set images for use in Nova.

{% note %}
Nova 3 does not allow installing multiple rank sets and letting users choose which they want to see when they're signed in.
{% /note %}

## Requirements

A properly formatted rank set add-on should have the following:

- An `ranks` directory that contains all of the rank set images, organized exactly how you want them organized
- An `Addon.php` file that extends the `Nova\Addons\RankSet` class

If you create a rank set add-on from Nova, it will create the proper folder structure for you.

## Actions

For rank set add-ons, the actions panel will be available to users with the following options:

### Install

The install option allows users of the add-on to copy the images to their `ranks` directory. This will start by removing all existing images before copying the directory structure from your `assets` folder into the `ranks` directory.

### Uninstall

The uninstall option allows users of the add-on to remove all images and directories from their `ranks` directory.

### Replace

The replace option allows users of the add-on to replace any similarly named file in the `ranks` directory with the version from the add-on's `assets` folder. This will leave any image it does not find in the add-on's `assets` folder alone, thus preserving any custom images you've added to your `ranks` directory.

### Append

The append option allows users of the add-on to add any images that do not exist in the `ranks` directory, but will leave any existing images alone.
