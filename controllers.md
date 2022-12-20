---
title: Controllers
description: Get to know the heart and soul of Nova - controllers.
layout: docs
---

## What is a controller?

Controllers are the heart of your application as they determine how requests from the browser are handled by Nova. A controller is simply a PHP class that is named in a way that can be associated with a URI. In fact, Nova's URI can provide some insightful information about what controller and method are being used for the page being viewed:

- When a controller’s name matches the first segment of a URI, it will be loaded.
- The second segment of the URI determines which method in the controller gets called.
- If your URI contains more than two segments they will be passed to your method as parameters.

`/main/contact`

In the above example, the `main` controller will be loaded and the `contact` method will be called.

`/characters/bio/77`

In this example, the `characters` controller will be loaded and the `bio` method will be called. Additionally, you'll be able to add an argument to your controller method to access the `77` in the URI. (This is what allows Nova to have access to the necessary data to show a specific character bio without having to hard-code everything.)

{% callout title="Deep dive" %}
You can read more about how CodeIgniter's controllers work in their [documentation](https://codeigniter.com/userguide3/general/controllers.html).
{% /callout %}

## Extending controllers

In order to provide as much flexibility as possible, Nova is split up into two distinct layers: the core and the application. Any work Anodyne does on Nova lives inside "the core". Any work that you do on your game's site is "the application". This is done to ensure that any update to Nova doesn't reset the changes you've made to your installation of Nova.

### Core controllers

The "core" layer of Nova is considered anything that lives **inside** the `nova` directory. (As an aside, this is what allows for the simplicity of only needing to replace the `nova` directory when updating to the latest version.)

When it comes to controllers, you'll find that all of Nova's core controllers are located in the `nova/modules/core/controllers` directory. To avoid naming conflicts, all of Nova's core controllers are prefixed with `nova_`.

### Application controllers

The "application" layer of Nova is considered anything that lives **outside** of the `nova` directory.

When it comes to controllers, all of Nova's application controllers are located in the `application/controllers` directory. Nova comes with all of the needed controllers out of the box, but if you want to create new sections with new pages, you can add your own controllers here.

### Customizations

When you open an application controller, you'll see a file that looks something like this:

```php
require_once MODPATH.'core/controllers/nova_main.php';

class Main extends Nova_main {

	public function __construct()
	{
		parent::__construct();
	}
}
```

Nova starts by pulling in the core controller. This allows us to use the PHP class that we defined in the core. Once that file is loaded, we can extend the application controller with the core controller.

Because of PHP's inheritance and how CodeIgniter treats controller, this means you can add any new methods you want to this class and you'll be able to access those controller method as pages of the same name (i.e. a method named `foo` will map to a page with the URI of `/main/foo`). This also means is that you can *override* any existing method with one of your own by adding a method of the same name in your application controller.

{% callout title="Overriding controller methods" %}
When it comes to overriding a controller method, the recommended way of doing that is to copy the method from the core controller and paste it into the application controller. You then have a working copy of the page from which to modify whatever you want.
{% /callout %}

## Understanding controllers

Now that you understand *how* to extend one of Nova's controllers, let's dig deeper into the various pieces involved in a Nova controller.

### `$data`

Any data that will be sent to the view is stored inside of an array in the controller method called `$data`. This array stores things like language items, form fields and controls, raw information out of the database, and much more. The odds are that anything you want to do or change is stored in the `$data` array.

{% callout title="Debugging" %}
If you're trying to debug and see what data Nova is sending to the browser, before the `Template::render()` call, you can write `die(var_dump($data));` to stop executing the code and see what's in the `$data` variable.
{% /callout %}

Since `$data` is sent to the view in its entirety, this also means that if you want to add *additional* data to a view, you can simply assign it to a key on the `$data` array and you'll have access to it in the view files using the key name as the variable.

```php
// In the controller...
$data['foo'] = 'bar';

// In the view file...
echo $foo; // will print out "bar"
```

### `$js_data`

Nova takes a similar approach to passing data from PHP to Javascript as well, but with an aptly named `$js_data` array. Everything mentioned above applies to Javascript data.

{% callout title="Be careful!" type="warning" %}
Passing data from PHP to Javascript can lead to some unexpected results if you're not careful. You should reference how Nova handles passing data to Javascript before attempting to do so yourself.
{% /callout %}

### Templates

Nova uses a simple template library to render the entire page to the user's browser. Each individual piece of the template is called a region. As Nova is executing its code, it will assign data to specific regions. The library will take all of the regions and render them to the screen.

{% callout title="Deep dive" %}
Interested in learning more about the template library Nova uses? Dig in to the `nova/modules/core/libraries/Nova_template.php` file in your Nova installation to learn more.
{% /callout %}

Nova defines the following regions for templates:

- `title` - The title of the page used in the `head` of the HTML page
- `_redirect`
- `javascript` - The Javascript for the page
- `nav_main` - The main navigation for the page
- `nav_sub` - The secondary navigation for the page
- `flash_message` - Flash messages for indicating success/failure after a create, edit, or delete action
- `content` - The content of the page
- `ajax` - Secondary content for the page in the way of modal pop-ups

{% callout title="Commonly used regions" %}
In most cases, the regions that most Nova pages deal with are `content`, `javascript`, and `title`.
{% /callout %}

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

## Further reading

- [Learn how to interact with Nova models](/docs/2.7/models)
- [Learn how to interact with Nova libraries](/docs/2.7/libraries)
