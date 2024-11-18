---
title: Updates
description: Learn about the tools available to you for updating your theme.
layout: docs
section: Themes
---

When you push a new version of your theme, you need a way to let users know that there's a new version available for them to update. Nova provides two options for you to do that.

## Nova Add-on Exchange

If you choose the Nova Add-on Exchange as the distribution platform for your theme, you'll be able to make updates from the admin panel on the Anodyne site and have those version updates used to notify any users of your theme that a newer version is available. In order to use the Nova Add-on Exchange to look for updates to your theme, you will need to add the following code to your QuickInstall file:

```json
"repository": {
  "type": "anodyne",
  "id": "add_123"
}
```

The `id` should be the unique identifier that the Nova Add-on Exchange assigns to your theme. Additionally, you can choose to download a QuickInstall file from the admin panel with all of the information filled in for you.

## Github

We also offer the ability to use Github as the distribution platform for your theme as well. There are a few criteria to use Github to check for new versions:

1. Your repository must be public
2. You must use Github's releases feature
3. Your releases must use a standard numeric versioning (otherwise Nova won't be able to tell that a specific version is higher than another one)

In order to use Github to look for updates to your theme, you will need to add the following code to your QuickInstall file:

```json
"repository": {
  "type": "github",
  "id": "anodyne/nova"
}
```

The `id` should be the owner and repository that you want to use.

On the Nova side, we will pull the name of the repository and the release tag name to populate the information used for checking for new versions.

When you are ready to release a new version, all you need to do is publish a new release on the repository and Nova will see that new version and notify any users who have the theme installed.
