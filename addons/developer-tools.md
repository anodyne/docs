---
title: Developer tools
description: Learn about the tools available to developers for managing your add-on.
layout: docs
section: Add-ons
---

Beyond being added to the `addons` table, your custom work will often have other steps or things that need to be done to ensure it's setup properly. Nova provides several points for add-on authors to hook in to and setup their add-on correctly.

## Installing

When an add-on is added to Nova, a record is created in the `addons` table in the database for tracking the add-on. Instead of trying to hook into the database events, Nova provides a way to build all of the necessary logic and steps that you may need to ensure your add-on is working as intended.

To create an install script for your add-on, you can define an `install()` method in the `Addon.php` file at the root of your add-on. If that method exists, it will be called when a game master uses QuickInstall to install your add-on.

From inside the `install()` method, you can do whatever work you need to do in order to install and setup your add-on. Most often, this will include running database migrations to ensure the database is in the correct state, but there may be other things you need to do in addition to that.

```php
public function install(): void
{
    $this->runMigrations();
}
```

## Updating

As with any piece of software, big or small, there will be updates needed to fix issues and add new features. When the time comes for you to release an update for your add-on, Nova provides a way to allow you to programmatically make changes you need to ensure everything is working as expected.

To create an update script for your add-on, you can define an `update()` method in the `Addon.php` file at the root of your add-on.

From inside the `update()` method, you can do whatever work you need to do in order to update your add-on to the latest version. Most often, this will include running database migrations to ensure the database is in the correct state, but there may be other things you need to do in addition to that.

```php
public function update(): void
{
    $this->runMigrations();
}
```

{% note title="A word about updates" %}
Because of the nature of how add-ons work, there no specific mechanism in place like installing to automatically run an update script. Nova comes with the Add-on Actions panel in Add-ons management. You will need to direct game masters to open that actions panel and manually run the update script for your add-on after uploading the files.
{% /note %}

## Uninstalling

Sometimes, an add-on might not be what a game needs or their needs to may change. In those situations, they may need to remove your add-on from their site. Nova provides a way to allow you to back out the changes your add-on makes.

To create an uninstall script for your add-on, you can define an `uninstall()` method in the `Addon.php` file at the root of your add-on.

From inside the `uninstall()` method, you can do whatever work you need to do in order to remove your add-on from the site. Most often, this will include rolling back database migrations to ensure the database is in the correct state, but there may be other things you need to do in addition to that.

```php
public function uninstall(): void
{
    $this->rollbackMigrations();
}
```

{% note title="A word about uninstalling" %}
Nova will automatically run any uninstall script when a game master deletes an add-on from Add-ons management.
{% /note %}

## Database migrations

Sometimes you will need to create new database tables or modify existing database tables for your add-on. In those situations, you can leverage [Laravel's migrations system](https://laravel.com/docs/11.x/migrations).

If you are creating an add-on from inside of Nova, you can select the option to use database migrations and everything will be created for you.

Inside your migration, you can use all of Laravel's migration tools to build up your database table(s), create columns, create indexes, or whatever else you need to. You can also build the inverse process in the event someone uninstalls your add-on as well to ensure database tables are being properly removed.

## Notifying for updates

When you push a new version of your add-on, you need a way to let users know that there's a new version available for them to update. Nova provides two options for you to do that.

### Nova Add-on Exchange

If you choose the Nova Add-on Exchange as the distribution platform for your add-on, you'll be able to make updates from the admin panel on the Anodyne site and have those version updates used to notify any users of your add-on that a newer version is available. In order to use the Nova Add-on Exchange to look for updates to your add-on, you will need to add the following code to your QuickInstall file:

```json
"repository": {
  "type": "anodyne",
  "id": "add_123"
}
```

The `id` should be the unique identifier that the Nova Add-on Exchange assigns to your add-on. Additionally, you can choose to download a QuickInstall file from the admin panel with all of the information filled in for you.

### Github

We also offer the ability to use Github as the distribution platform for your add-on as well. There are a few criteria to use Github to check for new versions:

1. Your repository must be public
2. You must use Github's releases feature
3. Your releases must use a standard numeric versioning (otherwise Nova won't be able to tell that a specific version is higher than another one)

In order to use Github to look for updates to your add-on, you will need to add the following code to your QuickInstall file:

```json
"repository": {
  "type": "github",
  "id": "anodyne/nova"
}
```

The `id` should be the owner and repository that you want to use.

On the Nova side, we will pull the name of the repository and the release tag name to populate the information used for checking for new versions.

When you are ready to release a new version, all you need to do is publish a new release on the repository and Nova will see that new version and notify any users who have the add-on installed.
