# Controllers

Get to know the heart and soul of Nova: controllers.

---

## What is a controller?

## URL structure

Nova's URLs provide some insightful information about what controller and method are being used for the page.

## App vs core

In order to provide the flexibility to change core pages and create new pages, there are two different kinds of controller files: core files and application files.

## Extending controllers

### `$data`

Any data that will be sent to the view is stored inside of a variable in the controller method called `$data`.

### Regions and templates

Nova uses a template library to build up all of the needed pieces to render the entire page to the user's browser. Each piece of the layout is defined as a region.

The regions that most Nova pages deal with are `content`, `javascript`, and `title`.

### Interacting with models

Models are PHP classes designed to be the primary way of interacting with Nova's database. Each model has its own set of methods for different things it can pull out of the database, so if you're working with a model, it's important to look at what methods that model provides.

:::info A Deeper Dive
You can read more about CodeIgniter's models in their [documentation](https://codeigniter.com/userguide3/general/models.html).
:::

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

### Interacting with libraries

Libraries
