---
title: Genre add-ons
description: Get started with building genre add-ons for Nova.
layout: docs
section: Add-ons
---

A genre add-on is a type of add-on that allows authors to package up the department, position, and rank name data for use in Nova. Additionally, genres can include all of the necessary rank set images as well.

## Requirements

A properly formatted genre add-on should have the following:

- An `assets` directory that contains all of the rank set images, organized exactly how you want them organized
- An `Addon.php` file that extends the `Nova\Addons\Genre` class

If you create a genre add-on from Nova, it will create the proper folder structure for you.

## Actions

For genre add-ons, the actions panel will be available to users with the following options:

### Install

The install option allows users of the add-on to copy the images to their `ranks` directory. This will start by removing all existing images before copying the directory structure from your `assets` folder into the `ranks` directory.

### Uninstall

The uninstall option allows users of the add-on to remove all images and directories from their `ranks` directory.

### Update

The replace option allows users of the add-on to replace any similarly named file in the `ranks` directory with the version from the add-on's `assets` folder. This will leave any image it does not find in the add-on's `assets` folder alone, thus preserving any custom images you've added to your `ranks` directory.

{% warning %}
Updating genre data is a potentially destructive action. We do our best to not mess with any existing data, but given the nature of updating all of the different pieces of data included in a genre, you may find that changes you've made to some records are reset.
{% /warning %}
