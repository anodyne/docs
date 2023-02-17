---
title: Skinning Nova - Uploading & installing
description: Learn how to upload and install Nova skins.
layout: docs
section: Skins
---

## Uploading

All of Nova's skins are stored in individual folders in the same location: `application/views`. If you have a skin you've downloaded from [AnodyneXtras](https://xtras.anodyne-productions.com) or created yourself, you can use your [FTP client](/docs/2.7/before-getting-started#helpful-tools) and upload the directory to your `application/views` folder.

## Installing

Nova allows for manually adding records to the Skin Catalogue, which in turn "installs" the skin into your Nova game for users to be able to select.

1. Click on **Add Skin**.
2. Fill out the modal pop-up with all of the information about the skin you're creating.
3. Click **Submit**.

Once the page refreshes, you should see your skin listed in the Skin Catalogue.

## QuickInstall

You can certainly go through the process above to install your skin, but Nova provides a simpler way to do this out-of-the box called **QuickInstall**. When Nova detects a skin in the `application/views` directory that isn't in its database that has a QuickInstall file, it'll provide you a button to click to automate the install process for you.

{% screenshot src="/images/docs/2.7/skins/quickinstall.png" alt="quickinstall" /%}

In order to use QuickInstall in your own skins, all you need to do is include a `skin.yml` file at the root of your skin with the following contents:

```yaml
skin: Space
location: space
credits: The Space skin was created by John Public. Edits are permissible provided the original credits remain intact.
version: 1.0
sections:
  -
    type: main
    preview: preview-main.jpg
  -
    type: wiki
    preview: preview-wiki.jpg
  -
    type: login
    preview: preview-login.jpg
  -
    type: admin
    preview: preview-admin.jpg
```

This basic information allows Nova to create the necessary database records that the Skin Catalogue will use for displaying installed skins. Here's a basic explanation of what these items are for:

- The `skin` attribute tells Nova the name of the skin. This value be used for selecting the skin in the Site's Settings and in each user's Site Options.
- The `location` attribute tells Nova where the skin exists in the `application/views` directory. This value is case-sensitive, so be sure to copy the name of the directory that you picked exactly.
- The `credits` attribute is the value that Nova uses on the credits page and should contain information about the author, where to find the skin, any attribution or inspiration, and any usage license that comes with the skin. This attribute can contain HTML code.
- The `version` attribute is a value for keeping track of the version of the skin. In some cases, you may need to reference this when helping users of your skin to know which version of the skin they have uploaded.
- The `sections` attribute is an array of the sections your skin includes. Most skin developers include all sections, but in some cases a skin might only include one or two sections. This tells Nova which sections it should display your skin as an option for.

{% warning title="Order of operations" %}
Before you delete a skin, make sure that you've changed your default skin for the site to something else. If you don't, this can sometimes result in a white screen with an error about not being able to find a template.
{% /warning %}
