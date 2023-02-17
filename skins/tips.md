---
title: Skinning Nova - Tips & tricks
description: These tips and tricks will help you skin Nova faster and easier.
layout: docs
section: Skins
---

With a basic understanding of how a Nova skin works, you can now jump into creating or customizing one for your Nova game. Before you get started, here are a few tips that can help you developing your skin.

## Inspect Element

Most browsers come with a tool called Inspect Element. This allows you to see the rendered HTML structure and accompanying CSS on any page. This is especially helpful when you use it to select a specific element on the page and customize its styles right in the browser. This allows you to test out some changes and see them in realtime before adding them to your stylesheet. While it may not seem like a lot of time, it can help speed up the process of tweaking to your skin to your liking.

## Text editors are your friend

[Text editors](/docs/2.6/getting-started#text-editors) can be one of the most powerful tools at your fingertips when skinning Nova. We recommend using one a text editor that will allow you to open the entire skin's folder as a project. By doing this, you'll be able to leverage text editor features like search, find and replace, and other tools that will make the development process much simpler. This will also make it much easier to create folders and files as necessary and modify template files with proper syntax highlighting.

## PHP's `var_dump`

Since Nova is written in PHP, knowing what each variable contains can be incredibly helpful in the skinning process. PHP has a function called `var_dump()` that you can use to preview the raw content of any variable you see in a template or page file.

For example, if you wanted to inspect the contents of the `$panel` variable you could do something like this:

```php
// Putting this code anywhere in your template file...
var_dump($panel);

// Will print the raw data to the screen...
array(3) {
	["inbox"]=> array(1) {
		["src"]=> string(50) "application/views/titan/main/images/panel-mail.png"
	}
	["writing"]=> array(1) {
		["src"]=> string(53) "application/views/titan/main/images/panel-writing.png"
	}
	["dashboard"]=> array(1) {
		["src"]=> string(55) "application/views/titan/main/images/panel-dashboard.png"
	}
}
```

In this case, the `var_dump` function revealed that the variable `$panel` contains an array with three items: `inbox`, `writing`, and `dashboard`. Further, each of those items contains another array with a link to the image attached to each panel item. This can help you determine how to use a given variable. For example, if you wanted get the image for the private messages inbox, you now know you can reference it by using `$panel['inbox']['src']`.

{% warning title="Remove your debug code" %}
Make sure that you've removed all debugging code before submitting your skin to [AnodyneXtras](https://xtras.anodyne-productions.com). The last thing you want to do is have your masterpiece ruined with a bunch of PHP debugging code!
{% /warning %}
