---
title: Add-ons
description: Here are a few things you should know before using Nova 3.
layout: docs
section: Add-ons
---

## Directory structure

- Migrations
- Providers
    - AddonServiceProvider.php
- addon.json
- Addon.php

### Service provider

Every add-on created through Nova includes a [service provider](https://laravel.com/docs/11.x/providers) that will be registered during Nova's request cycle. Service providers are a central place to register services into the container, setup event listeners, and much more. The add-on's service provider is where you can do all of your setup for the add-on to run properly or extend Nova as needed.

```php
class AddonServiceProvider extends BaseAddonServiceProvider
{
    protected string $location = 'PostArchiver';

    public function boot()
    {
        Event::listen(PostPublished::class, fn () => $sendToGoogle->send());
    }
}
```

The `boot()` method is called during each Nova request and is the place to ensure that anything you need done to make your add-on work is done.

Note: in order to make add-on service providers as hands-off as possible, you will not be able to do any work in a `register()` method like you would in a normal Laravel application. Any work you want to do will have to be done in the `boot()` method.
