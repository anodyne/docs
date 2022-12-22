---
title: Models
description: Learn Nova's language of talking to the database.
layout: docs
---

## What is a model?

Models are PHP classes designed to be the primary way of interacting with Nova's database. Each model has its own set of methods for different things it can pull out of the database, so if you're working with a model, it's important to look at what methods that model provides.

{% note title="Deep dive" %}
You can read more about CodeIgniter's models in their [documentation](https://codeigniter.com/userguide2/general/models.html).
{% /note %}

By default, Nova does not autoload any models at a the global level (meaning from the `autoload.php` config file). In some rare instances, Nova will pre-load models in the controller's constructor simply to reduce the amount of boilerplate code that needs to be written, but in most cases, models aren't loaded ahead of time. This means that before interacting with a model, you will need to load it:

```php
// Load the model
$this->load->model('characters_model');

// Now use it
$this->characters_model->get_all_characters();
```

The above code will load the model and you'll be able to access any methods of the model by referencing the name of the model. This is obviously pretty verbose, so CodeIgniter provides a way to assign the model to an alias:

```php
// Load the model
$this->load->model('characters_model', 'char');

// Now use it
$this->char->get_all_characters();
```

{% note title="Note" %}
All of Nova's available models can be found in the `nova/modules/core/models` directory.
{% /note %}

## Extending models

In order to provide as much flexibility as possible, Nova is split up into two distinct layers: the core and the application. Any work Anodyne does on Nova lives inside "the core". Any work that you do on your game's site is "the application". This is done to ensure that any update to Nova doesn't reset the changes you've made to your installation of Nova.

### Core models

The "core" layer of Nova is considered anything that lives **inside** the `nova` directory. (As an aside, this is what allows for the simplicity of only needing to replace the `nova` directory when updating to the latest version.)

When it comes to models, you'll find that all of Nova's core models are located in the `nova/modules/core/models` directory. To avoid naming conflicts, all of Nova's core models are prefixed with `nova_`.

### Application models

The "application" layer of Nova is considered anything that lives **outside** of the `nova` directory.

When it comes to models, all of Nova's application models are located in the `application/models` directory. Nova comes with all of the needed models out of the box, but if you want to create new models for interacting with new database tables you've created, you can add your own models here.

### Customizations

When you open an application model, you'll see a file that looks something like this:

```php
require_once MODPATH.'core/models/nova_characters_model.php';

class Characters_model extends Nova_characters_model {

	public function __construct()
	{
		parent::__construct();
	}
}
```

Nova starts by pulling in the core model. This allows us to use the PHP class that we defined in the core. Once that file is loaded, we can extend the application model with the core model. Because of PHP's inheritance, this means you can add any new methods you want to this class and you'll be able to use those model methods in Nova. This also means is that you can *override* any existing method with one of your own by adding a method of the same name in your application model.

{% note title="Quick tip" %}
When it comes to overriding a model method, the recommended way of doing that is to copy the method from the core model and paste it into the application model. You then have a working copy of the method from which to modify whatever you want.
{% /note %}

## Further reading

- [Learn about CodeIgniter's Database library](https://codeigniter.com/userguide2/database/index.html)
