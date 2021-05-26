# Skinning Tips & Tricks

Learn how to theme Nova to match the style and spirit of your game.

---

With a basic understanding of how a Nova skin works, you can now jump into customizing one for your Nova installation. Before you get started, here are a few tips that can help you in the development process.

## Inspect Element

Most browsers come with a tool called Inspect Element. This allows you to preview the rendered HTML structure and accompanying CSS of any page. You can use it to select a specific element within a page and customize accompanying styles.

For example, you can use inspect element to find the main navigation and manipulate, in real time, changes to the navigation's text color, size, etc. It is a powerful tool that you can use to decide what styles work for you, and then you can copy the code into one of your skin's CSS files.

## `var_dump`

Since the backbone of Nova is PHP, knowing what each variable contains can be incredibly helpful in the skinning process. PHP has a function called `var_dump()` that you can use to preview the raw content of any variable you see in a template or page file.

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

In this case, the `var_dump` function revealed that the variable `$panel` contains an array with three items: inbox, writing, and dashboard. Further, each of those items contains another array with a link to the image attached to each panel item. This can help you determine how to use a given variable. For example, if you wanted get the image for the private messages inbox, you now know it's located within `$panel['inbox']['src']`.

:::warning
Make sure that you've removed all debugging code before submitting your skin to AnodyneXtras. The last thing you want to do is have your masterpiece ruined with a bunch of PHP debugging code!
:::
