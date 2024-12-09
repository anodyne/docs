---
title: Extension add-ons
description: Get started with building extension add-ons for Nova.
layout: docs
section: Add-ons
---

An extension add-on is a type of add-on that allows authors to package up the department, position, and rank name data for use in Nova. Additionally, genres can include all of the necessary rank set images as well.

## Requirements

A properly formatted extension add-on should have the following:

- An `AddonServiceProvider.php` file in a `Providers` directory that extends the `Nova\AddonServiceProvider` class
- An `Addon.php` file that extends the `Nova\Addons\Extension` class

If you create a extension add-on from Nova, it will create the proper folder structure for you.

## Actions

For extension add-ons, the actions panel will be available to users with the following options:

### Install

When an add-on is added to Nova, a record is created in the `addons` table in the database for tracking the add-on. Instead of trying to hook into the database events, Nova provides a way to build all of the necessary logic and steps that you may need to ensure your add-on is working as intended.

To create an install script for your add-on, you can define an `install()` method in the `Addon.php` file at the root of your add-on.

From inside the `install()` method, you can do whatever work you need to do in order to install and setup your add-on. Most often, this will include running database migrations to ensure the database is in the correct state, but there may be other things you need to do in addition to that.

```php
public function install(): void
{
    $this->runMigrations();
}
```

### Uninstall

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

### Update

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
Because of the nature of how add-ons work, there no specific mechanism in place to automatically run an update script. Nova comes with the Add-on Actions panel in Add-ons management. You will need to direct game masters to open that actions panel and manually run the update script for your add-on after uploading the files.
{% /note %}

### Run migrations

The replace option allows users of the add-on to replace any similarly named file in the `ranks` directory with the version from the add-on's `assets` folder. This will leave any image it does not find in the add-on's `assets` folder alone, thus preserving any custom images you've added to your `ranks` directory.

### Rollback migrations

The replace option allows users of the add-on to replace any similarly named file in the `ranks` directory with the version from the add-on's `assets` folder. This will leave any image it does not find in the add-on's `assets` folder alone, thus preserving any custom images you've added to your `ranks` directory.
