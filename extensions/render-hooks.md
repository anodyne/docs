---
title: Render hooks
description: Learn how to inject HTML into Nova pages
layout: docs
section: Extensions
---

Nova allows you to render Blade content at various points in the framework's views. It's useful for extensions to be able to inject HTML into the framework.

## Registering render hooks

To register render hooks, you can call `NovaView::registerRenderHook()` from a service provider or middleware. The first argument is the name of the render hook, and the second argument is a callback that returns the content to be rendered:

```php
use NovaView;
use Illuminate\Support\Facades\Blade;

NovaView::registerRenderHook(
    'admin::content.end',
    fn (): string => Blade::render('@livewire(\'livewire-ui-modal\')')
);
```

You could also render view content from a file:

```php
use NovaView;
use Illuminate\Contracts\View\View;

NovaView::registerRenderHook(
    'admin::content.end',
    fn (): View => view('impersonation-banner')
);
```

## Available render hooks

- `admin::body.start` - After the opening `<body>` tag of the admin system
- `admin::body.end` - Before the closing `</body>` tag of the admin system
- `admin::content.start` - Before the admin page content, inside `<main>`
- `admin::content.end` - After the admin page content, inside `<main>`
- `admin::footer.start` - Before the admin page footer, inside `<footer>`
- `admin::footer.end` - After the admin page footer, inside `<footer>`
- `admin::scripts.before` - Before the admin scripts are called at the end of the `<body>` tag
- `admin::scripts.after` - After the admin scripts are called at the end of the `<body>` tag
- `admin::head-scripts.before` - Before the admin scripts are called in the `<head>` tag
- `admin::head-scripts.after` - After the admin scripts are called in the `<head>` tag
- `admin::styles.before` - Before the admin styles are called in the `<head>` tag
- `admin::styles.after` - After the admin styles are called in the `<head>` tag
- `auth::login.form.before` - Before the login form
- `auth::login.form.after` - After the login form
- `public::body.start` - After the opening `<body>` tag of the public pages
- `public::body.end` - Before the closing `</body>` tag of the public pages
- `public::content.start` - Before public page content, inside `<main>`
- `public::content.end` - After public page content, inside `<main>`
- `public::footer.start` - Before the public page footer, inside `<footer>`
- `public::footer.end` - After the public page footer, inside `<footer>`

## Rendering hooks

Extension developers might find it useful to expose render hooks to their users. You do not need to register them anywhere, simply output them in Blade like so:

```blade
{{ NovaView::renderHook('render.hook.name') }}
```
