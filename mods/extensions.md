---
title: Extensions
description: Nova provides a robust extensions system for MODs.
tag: EXPERIMENTAL
layout: docs
section: MODs
---

{% warning title="Experimental feature" %}
This is an experimental feature, so there could be unexpected issues when using this feature.
{% /warning %}

Extensions are a type of Nova mod that are placed within the `application/extensions` folder and enabled in `application/config/extensions.php`. As opposed to other types of Nova mods, extensions do not require modifying any Nova code files. This simplifies installation and maintenance.

## Installing an extension

When you download an extension, the installation will always follow roughly the same process:

1. Place the extension directory within your `application/extensions` directory;
2. Execute any database commands (or other actions) stipulated by the extension; and
3. Add the extension to the end of `application/config/extensions.php`.

For example, if you have extracted an extension named `my_extension` into `application/extensions/my_extension`, it could be enabled by adding the following to `application/config/extensions.php`:

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/config/nova_extensions.php';

$config['extensions']['enabled'][] = 'my_extension';
```

Some extensions may specify that they require another extension. If this is the case, you should ensure that all required extensions come before the extension that requires them within the `application/config/extensions.php` file.

## Building an extension

An extension is defined as a directory placed within the `application/extensions` directory that, at minimum, has a single file `init.php`. The `init.php` file serves to bootstrap the file, attaching event listeners, defining other required extensions, etc., as necessary to achieve the extension's purpose.

As long as the extension is enabled within `application/config/extensions.php` like this:

```php
$config['extensions']['enabled'][] = 'my_extension';
```

Then the extension's `application/extensions/my_extension/init.php` will be run. All of the extension's code may be packaged directly within `init.php` or it may be included/required from other files.

## Extension init.php

The `init.php` file has its own scope with a number of properties and methods available within the `$this` variable.

To get the name of the extension, such as `my_extension` for `application/extensions/my_extension/init.php`:

```php
$this->name
```

To get the path of the extension directory, such as `application/extensions/my_extension` for `application/extensions/my_extension/init.php`:

```php
$this->path
```

To set another extension that must be loaded first (so specified earlier in application/config/extensions.php), such as requiring the `jquery` extension in another extension:

```php
$this->require_extension('jquery');
```

The two main reasons for requiring an extension:

1. An extension requires behavior enabled by another extension; or
2. An extension uses an object exposed by another extension.

For case (2), an extension can expose an object for use by other extensions as:

```php
$this->attach('generator', new jquery_generator());
```

Supposing that the above statement was within a `jquery` extension, then this exposed object can be leveraged in any extension that requires it (as well as in a sim's application code):

```php
$this->extension['jquery']['generator']->select('.page-head')->html('Hello World!')
```

Besides exposing objects, the primary thing an extension does is hook into the CodeIgniter instance to modify behavior.

To interface with the CodeIgniter instance:

```php
$this->ci
```

For example, an extension could attach an event listener such as:

```php
$this->ci->event->listen(['template', 'render', 'data'], function ($event) {
  $event['data']['javascript']
        .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">'
         . '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>'
         . $this->extension['timepicker']->inline_js('timepicker', 'global');
});
```

For shorthand, calls directly to `$this` are call-forwarded to `$this->ci`.

## Extension controllers and views

An extension can define controllers within a controllers folder inside the extension folder. In order to avoid URL collisions between the extension and other routes in the Nova app, extensions will have a URL like:

```
http://my.domain.com/extensions/my_extension/my_controller/my_method
```

The controller would then be specified in:

```
application/extensions/my_extension/controllers/my_controller
```

To avoid a class name collision, the controller class must also be named in a special way:

- Start the class name with `**extensions`
- Next, place two more underscores `**`
- Next, place the extension name, such as `my_extension`
- Next, place two more underscores `**`
- Next, place the controller name

So for the above example, the class would be `**extensions**my_extension**my_controller`:

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/libraries/Nova_controller_main.php';

class **extensions**my_extension**my_controller extends Nova_controller_main
{
	public function __construct()
	{
		parent::__construct();
		$this->_regions['nav_sub'] = Menu::build('sub', 'sim');
	}

  public function my_method()
  {
      $this->_regions['title'] = 'Hello World!';
      $this->_regions['content'] = 'This is an extension controller.';
      Template::assign($this->_regions);
      Template::render();
  }
}
```

To get the URL to my_method within the example above, one may simple call:

```php
$this->extension['chronological_mission_posts']->url('my_controller/my_method');
```

The extension makes it possible to load a view from the views folder within the extension folder:

```php
$this->extension['my_extension']->view('my_method_view', $this->skin, 'main', $data);
```

This view would be located at `applications/extensions/my_extension/views/main/pages/my_method_view.php`.

The extension makes it possible to load CSS from the views folder within the extension folder:

```php
$this->extension['my_extension']->inline_css('my_method_styles', $this->skin, 'main', $data);
```

This view would be located at `applications/extensions/my_extension/views/main/css/my_method_styles.css`, and the outcome will be returned as inline CSS within a `<style>` tag for maximum portability.

The extension makes it possible to load JavaScript from the views folder within the extension folder:

```php
$this->extension['my_extension']->inline_js('my_method_scripts', $this->skin, 'main', $data);
```

This view would be located at `applications/extensions/my_extension/views/main/js/my_method_scripts.js`, and the outcome will be returned as inline CSS within a `<script type="text/javascript">` tag for maximum portability.

Putting it all together, one might end up with a controller like:

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/libraries/Nova_controller_main.php';

class **extensions**my_extension**my_controller extends Nova_controller_main
{
	public function __construct()
	{
		parent::__construct();
		$this->_regions['nav_sub'] = Menu::build('sub', 'sim');
	}

    public function my_method()
    {
        $this->_regions['title'] = 'Hello World!';
        $this->_regions['content'] = $this->extension['my_extension']->view('my_method_view', $this->skin, 'main', $data);
        $this->_regions['javascript'] .= $this->extension['my_extension']->inline_css('my_method_styles', $this->skin, 'main', $data);
        $this->_regions['javascript'] .= $this->extension['my_extension']->inline_js('my_method_scripts', $this->skin, 'main', $data);
        Template::assign($this->_regions);
        Template::render();
    }
}
```

## Overriding extension controllers and views

An application can seamlessly override the behavior of an extension-defined controller without modifying the extension. To do this, suppose the goal is to override `my_controller` within `my_extension` (defined as above in `application/extensions/my_extension/controllers/my_controller.php`). To do this, define the file:

```
application/controllers/extensions/my_extension/my_controller.php
```

In this file, define the controller with the same name as the extension controller has, except without the leading `**` (the difference in class names here allows you to inherit the one from the extension). For example:

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'extensions/my_extension/controllers/my_controller.php';

class extensions**my_extension**my_controller extends **extensions**my_extension**my_controller
{
    public function my_method()
    {
        $this->_regions['title'] = 'Hello Sky!';
        $this->_regions['content'] = $this->extension['my_extension']->view('my_method_view', $this->skin, 'main', $data);
        $this->_regions['javascript'] .= $this->extension['my_extension']->inline_css('my_method_styles', $this->skin, 'main', $data);
        $this->_regions['javascript'] .= $this->extension['my_extension']->inline_js('my_method_scripts', $this->skin, 'main', $data);
        Template::assign($this->_regions);
        Template::render();
    }
}
```

A skin can also override an extension view to provide direct support for it. For example, suppose `my_skin` wishes to provide a slightly modified version of the `my_method_view` used in the above exaple for `my_extension`. For the extension view located at , the override for the skin would be in:

```
application/views/my_skin/extensions/my_extension/main/pages/my_method_view.php
```

If a sim wishes to modify the extension view, but the skin the sim uses does not support it, an override may also be specified in:

```
application/views/_base_override/extensions/my_extension/main/pages/my_method_view.php
```
