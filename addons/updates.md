---
title: Updates
description: Learn about the tools available to you for updating your add-on.
layout: docs
section: Add-ons
---

## Nova Add-on Exchange

If you choose the Nova Add-on Exchange as the distribution platform for your add-on, you will be able to make updates from the admin panel and have those version updates used to notify any users of your add-on that a newer version is available. In order to use the Nova Add-on Exchange to look for updates to your add-on, you will need to add the following code to your QuickInstall file:

```json
"repository": {
  "type": "anodyne",
  "id": "add_123"
}
```

The `id` should be the unique identifier that the Nova Add-on Exchange assigns to your add-on. Additionally, you can choose to download QuickInstall file from the admin panel with all of the information filled in for you.

## Github

We also offer the ability to use Github as the distribution platform for your add-on as well. There are 2 criteria to use Github to check for new versions:

1. Your repository must be public
2. You must use Github's releases feature

In order to use Github to look for updates to your add-on, you will need to add the following code to your QuickInstall file:

```json
"repository": {
  "type": "github",
  "id": "anodyne/nova"
}
```

The `id` should be the owner and repository that you want to use.

On the Nova side, we will pull the name of the repository and the release tag name to populate the information used for checking for new versions.
