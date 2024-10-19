---
title: Installing
description: Learn about the tools available to you for installing your add-on.
layout: docs
section: Add-ons
---

In your `Addon.php` file, you can define an `install()` method that will be called whenever your add-on is installed.

```php
public function install(): void
{
    // Do whatever you need to do in here
}
```

From inside the `install()` method, you can do whatever work you need to do in order to install and setup your add-on. Most often, this will include running database migrations to ensure the database is in the correct state. To do that, you can simply call the `runMigrations()` method.

```php
public function install(): void
{
    $this->runMigrations();
}
```

## Database Migrations

Sometimes you will need to create new database tables or modify existing database tables for your add-on. In those situations, you can leverage [Laravel's migrations system](https://laravel.com/docs/11.x/migrations).

If you are creating an add-on from inside of Nova, you can select the option to use database migrations and everything will be created for you.

Inside your migration, you can use all of Laravel's migration tools to build up your database table(s), create columns, create indices, or whatever else you need to. You can also build the inverse process for the event that someone uninstalls your add-on as well to ensure database tables are being properly removed.
