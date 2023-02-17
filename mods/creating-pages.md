---
title: Creating a page
description: Sometimes, the built-in pages in Nova won't be enough and you need to create a new page for you sim to hold new information.
layout: docs
section: MODs
---

Creating pages can be as simple or as complex as you would like for it to be. No matter the level of difficulty, each sim always wishes to convey a different set of information for its players. For example, you may wish to share a page that displays the full rank hierarchy for an organization, or a set of uniforms that characters would wear.

For the purposes of this example, we want to proudly share some awards that have been bestowed upon our game from our parent simming community.

The simple solution would be to use **Thresher**, Nova's built-in mini-wiki. Using Thresher, you can quickly and easily create a new page, add links to images and whatever else you want. The only downside to this solution is that it's stored in the wiki, and there it couldn't be as pretty as it would be on the rest of the site. If that isn't an issue or you're having trouble following the more advanced tutorial below, Thresher is your best bet.

That's all well and good, but what if you don't want the page stored in the wiki? Instead, you want it as part of your sim section. Let's step through how you would go about adding a new page to the **sim** section.

## Set up the controllers

This is, most likely, one of your first forays into controllers. In the simplest terms, a controller is like a traffic cop. The web browser navigates to a URL at which point the traffic cop (the controller), tells you where to go from there. A controller is simply a PHP class that directs a request to the appropriate place. In order to build our page, we need some simple code in our controller.

To start, we're going to open `application/controllers/sim.php`. This is the controller that handles all of the pages in the sim section. When you open the file, you'll notice that it's almost empty. The core sim pages are stored in the base controller in the Nova module. Since we're not interested in modifying those, we're going to add a new controller action to this file after the comment about adding your own methods after it.

```php
public function sim_allawards()
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false);
  $this->_regions['title'].= "Awards We've Won";

  Template::assign($this->_regions);

  Template::render();
}
```

## Set up the view

If you tried to go to your page above, you'd be greeted by a nasty error telling you something is missing. What we're missing is the guts of the page, or the view file. The second part of this is to create your view file. To do that, we're going to create a file called `sim_allawards.php` in `application/views/_base_override/main/pages`.

So what are we going to put in our view file?

```html
<h1 class="page-head">Awards We've Won</h1>

<p>Below is a list of all the awards we've won!</p>

<p><img src="<?php echo base_url();?>app/assets/images/award_image.jpg" /></p>
```

When it's all done, it'll look something like this:

![Sim Awards Page](/images/docs/2.6/creating-pages/awardspage.png)

As you can see, it's **really** straightforward. The only thing we're doing is using CodeIgniter's built-in `base_url` function to get the base URL of our site. (If we don't use the base URL, CI will try to append index.php to our image path and it won't be able to find the image.)

From here, you can make whatever changes you want to the view file and continue to add awards. Because we've done all this work in the `application` directory, we don't have to worry about losing our changes when we make an update either!

## Understanding the controller code

Let's step through the code you inserted into the sim controller file piece-by-piece to see what's going on.

```php
public function sim_allawards() // [tl! focus]
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false);
  $this->_regions['title'].= "Awards We've Won";

  Template::assign($this->_regions);

  Template::render();
}
```

A controller action is nothing more than a class method. A class method is a function inside a class. Pretty simple. Nova will use the name of the controller action as part of the URL. (This actually is what tells the controller where it needs to go.) In this case, our URL would be `index.php/sim/sim_allawards`. You can name your controller action whatever you want provided it doesn't conflict with another method in that particular controller or that it isn't a reserved PHP word.

```php
public function sim_allawards()
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false); // [tl! focus]
  $this->_regions['title'].= "Awards We've Won";

  Template::assign($this->_regions);

  Template::render();
}
```

Nova templates are broken up into regions. The guts of a page are part of the content region. What we're doing here is assigning a view file to the content region to be rendered by the browser. Sounds complicated, but it really isn't. All you need to know is the second part: the location class.

In order for seamless substitution to work, we created a location class (it used to be a helper in Nova 1) that does all the heavy lifting and figures out where to pull files from. In this case, we're looking for a view that's named `sim_allawards.php` (the .php part is assumed so you don't have to include it). After that, the class is simply being told where to look and what section it's part of.

```php
public function sim_allawards()
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false);
  $this->_regions['title'].= "Awards We've Won"; // [tl! focus]

  Template::assign($this->_regions);

  Template::render();
}
```

Now, we're simply setting the title of the page (what we see in the browser's title bar). You can see that to whatever you want provided it's a string.

```php
public function sim_allawards()
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false);
  $this->_regions['title'].= "Awards We've Won";

  Template::assign($this->_regions); // [tl! focus]

  Template::render();
}
```

This is required as it takes all the regions and assigns them to the template.

```php
public function sim_allawards()
{
  $this->_regions['content'] = Location::view('sim_allawards', $this->skin, 'main', false);
  $this->_regions['title'].= "Awards We've Won";

  Template::assign($this->_regions);

  Template::render(); // [tl! focus]
}
```

Pretty self-explanatory here, but we're telling the Template class to render the template to the browser window.
