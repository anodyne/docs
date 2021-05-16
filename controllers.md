# Controllers

Get to know the heart and soul of Nova: controllers.

---

## What is a controller?

Controllers are the heart of your application as they determine how requests from the browser are handled by Nova. A controller is simply a PHP class that is named in a way that can be associated with a URI. In fact, Nova's URI can provide some insightful information about what controller and method are being used for the page being viewed:

- When a controller’s name matches the first segment of a URI, it will be loaded.
- The second segment of the URI determines which method in the controller gets called.
- If your URI contains more than two segments they will be passed to your method as parameters.

`https://example.com/index.php/main/contact`

In the above example, the `main` controller will be loaded and the `contact` method will be called.

`https://example.com/index.php/characters/bio/77`

In this example, the `characters` controller will be loaded and the `bio` method will be called. Additionally, you'll be able to add an argument to your controller method to access the `77` in the URI. (This is what allows Nova to have access to the necessary data to show a specific character bio without having to hard-code everything.)

## Application vs core

In order to provide the flexibility to change core pages and create new pages, there are two different kinds of controller files: core files and application files.

## Extending controllers

### `$data`

Any data that will be sent to the view is stored inside of an array in the controller method called `$data`. This array stores things like language items, form fields and controls, raw information out of the database, and much more. The odds are that anything you want to do or change is stored in the `$data` array.

:::tip
If you're trying to debug and see what data Nova is sending to the browser, before the `Template::render()` call, you can write `die(var_dump($data));` to stop executing the code and see what's in the `$data` variable.
:::

Since `$data` is sent to the view in its entirety, this also means that if you want to add _additional_ data to a view, you can simply assign it to a key on the `$data` array and you'll have access to it in the view files using the key name as the variable.

```php
// In the controller...
$data['foo'] = 'bar';

// In the view file...
echo $foo; // will print out "bar"
```

### `$js_data`

Nova takes a similar approach to passing data from PHP to Javascript as well, but with an aptly named `$js_data` array. Everything mentioned above applies to Javascript data.

:::warning
Passing data from PHP to Javascript can lead to some unexpected results if you're not careful. You should reference how Nova handles passing data to Javascript before attempting to do so yourself.
:::

### Templates

Nova uses a simple template library to render the entire page to the user's browser. Each individual piece of the template is called a region. As Nova is executing its code, it will assign data to specific regions. The library will take all of the regions and render them to the screen.

:::note A Deeper Dive
Interested in learning more about the template library Nova uses? Dig in to the `nova/modules/core/libraries/Nova_template.php` file in your Nova installation to learn more.
:::

Nova defines the following regions for templates:

- `title` - The title of the page used in the `head` of the HTML page
- `_redirect`
- `javascript` - The Javascript for the page
- `nav_main` - The main navigation for the page
- `nav_sub` - The secondary navigation for the page
- `flash_message` - Flash messages for indicating success/failure after a create, edit, or delete action
- `content` - The content of the page
- `ajax` - Secondary content for the page in the way of modal pop-ups

:::note
In most cases, the regions that most Nova pages deal with are `content`, `javascript`, and `title`.
:::

Nova's controllers are responsible for assigning the regions to the template and then instructing the template to render itself to the browser. In most controllers, you'll see code like this near the bottom of each method:

```php
$this->_regions['content'] = ...
$this->_regions['javascript'] = ...
$this->_regions['title'].= ...

Template::assign($this->_regions);

Template::render();
```

The first set of lines are telling Nova what to put into specific regions. These are most often view files or strings of text that Nova will add to the template library.

Next, Nova assigns all of the regions to the template.

And finally, Nova tells the template library to render everything it has and push it to the browser.

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
