---
title: Creating a page
description: Sometimes, the built-in pages in Nova won't be enough and you need to create a new page for you sim to hold new information.
layout: docs
---

Creating pages can be as simple or as complex as you would like for it to be. No matter the level of difficulty, each sim always wishes to convey a different set of information for its players. For example, you may wish to share a page that displays the full rank hierarchy for an organization, or a set of uniforms that characters would wear.

For the purposes of this example, we want to proudly share some awards that have been bestowed upon our game from our community.

The simple solution would be to use **Thresher**, Nova's built-in mini-wiki. Using Thresher, you can quickly and easily create a new page, add links to images and whatever else you want. The only downside to this solution is that it's stored in the wiki, and there it couldn't be as pretty as it would be on the rest of the site. If that isn't an issue or you're having trouble following the more advanced tutorial below, Thresher is your best bet.

That's all well and good, but what if you don't want the page stored in the wiki? Instead, you want it as part of your sim section. Let's step through how you would go about adding a new page to the sim section.

## Setting up the controller

This is, most likely, one of your first forays into Nova's [controllers](/docs/2.7/controllers). You can think of controllers in Nova like a traffic cop; the web browser navigates to a URL at which point the traffic cop (the controller) tells you where to go from there. A controller is simply a PHP class that directs a request to the appropriate place. In order to build our page, we need a little bit of code in our controller.

To start, we're going to open `application/controllers/Sim.php`. This is the controller that handles all of the pages in the sim section. When you first open the file, you'll notice that it's almost empty. The core sim pages are actually stored in a file tucked away in Nova's core. Since we're not interested in modifying those, we're going to add a new method to this class right after the comment about adding your own methods.

```php
public function allawards()
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false);
  $this->_regions['title'].= "Awards We've Won";

  Template::assign($this->_regions);

  Template::render();
}
```

## Setting up the view

If you tried to navigate to your page above, you'd be greeted with an error telling you something is missing. What we're missing is the guts of the page, or the view file. The second part of this is to create your view file. To do that, we're going to create a file called `sim_allawards.php` in `application/views/_base_override/main/pages`.

What are we going to put in our view file?

```html
<h1 class="page-head">Awards We've Won</h1>

<p>Below is a list of all the awards we've won!</p>

<p><img src="<?php echo base_url() . APPFOLDER;?>/assets/images/award_image.jpg" /></p>
```

When it's all done, it'll look something like this:

{% screenshot src="/images/docs/2.7/creating-pages/awardspage.png" alt="sim all awards page" /%}

For our view file, things are pretty straightforward. We're using one of CodeIgniter's built-in functions: `base_url` to get the base URL of our site. (If we don't use the base URL, CodeIgniter will try to append `index.php` to our image path and it won't be able to find the image.)

With this foundation, you can make whatever changes you want to the view file and continue to add awards or style it however you'd like. Because we've done all this work in the `application` directory, we don't have to worry about losing our changes when we make an update either!

## Understanding the controller code

Let's walk through the code we used in the controller to see what's going on.

```php
public function allawards() // [tl! focus]
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false);
  $this->_regions['title'].= "Awards We've Won";

  Template::assign($this->_regions);

  Template::render();
}
```

A controller action is nothing more than a class method. A class method is a function inside a class. Nova will use the name of the controller action as part of the URL. (This actually is what tells the controller where it needs to go.) In this case, our URL would be `index.php/sim/allawards`. You can name your controller action whatever you want provided it doesn't conflict with another method in that particular controller or that it isn't a reserved PHP word.

```php
public function allawards()
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false); // [tl! focus]
  $this->_regions['title'].= "Awards We've Won";

  Template::assign($this->_regions);

  Template::render();
}
```

Nova templates are broken up into regions. The guts of a page are part of the `content` region. We're assigning a view file to the content region to be rendered by the browser. It may sound complicated, but it's pretty simple. All you need to know is the second part: the `Location` class.

In order for [seamless substitution](/docs/2.7/seamless-substitution) to work, we've created the `Location` class that does all the heavy lifting of figuring out where to pull files from. In this case, we're looking for a view that's named `sim_allawards.php` (the .php part is assumed so you don't have to include it). After that, the `Location` class is simply being told where to look and what section it's a part of.

```php
public function allawards()
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false);
  $this->_regions['title'].= "Awards We've Won"; // [tl! focus]

  Template::assign($this->_regions);

  Template::render();
}
```

Now, we're setting the title of the page (what you see in the browser's title bar). You can set the title to whatever you want, provided it's a string.

```php
public function allawards()
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false);
  $this->_regions['title'].= "Awards We've Won";

  Template::assign($this->_regions); // [tl! focus]

  Template::render(); // [tl! focus]
}
```

These lines are required. First we assign all of the regions into the template and then tells the browser to render everything to your browser window.
