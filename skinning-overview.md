# Skinning

Learn how to skin Nova to match the style and spirit of your game.

---

## What is a skin?

A skin is the HTML, CSS, and Javascript behind every Nova page. It provides the site with a basic structure, style, and even a certain level of functionality. Skins can be found in the `application/views` directory.

## [WIP] Uploading a skin

- Where to get skins
- Uploading a skin

## Anatomy of a skin

As a skin author, you're free to structure your skin however you see fit. Through much trial and error, we've found a structure like this to be the most flexible way to approach building a Nova skin:

- `_global` - files used across multiple sections of the skin; you can name this directory whatever you want, but we've found `_global` to be the best option
- `admin` – files specific to the admin section of Nova; this directory cannot be renamed
- `login` – files specific to the login section of Nova; this directory cannot be renamed
- `main` – files specific to the main section of Nova; this directory cannot be renamed
- `wiki` – files specific to Nova's wiki; this directory cannot be renamed
- `preview-admin.jpg` – a preview image of the admin section (only used when selecting a skin); this image must be in the root directory of your skin and cannot be renamed or Nova will not be able to show a preview of the skin section to users
- `preview-login.jpg` – a preview image of the login section (only used when selecting a skin); this image must be in the root directory of your skin and cannot be renamed or Nova will not be able to show a preview of the skin section to users
- `preview-main.jpg` – a preview image of the main section (only used when selecting a skin); this image must be in the root directory of your skin and cannot be renamed or Nova will not be able to show a preview of the skin section to users
- `preview-wiki.jpg` – a preview image of the wiki section (only used when selecting a skin); this image must be in the root directory of your skin and cannot be renamed or Nova will not be able to show a preview of the skin section to users
- `skin.yml` – the QuickInstall file used by Nova to install the skin (see below for more information)
- `template_admin.php` – the base HTML structure of the admin section; this file must be in the root directory of your skin and cannot be renamed or your skin will not work
- `template_login.php` – the base HTML structure of the login section; this file must be in the root directory of your skin and cannot be renamed or your skin will not work
- `template_main.php` – the base HTML structure of the main section; this file must be in the root directory of your skin and cannot be renamed or your skin will not work
- `template_wiki.php` – the base HTML structure of the wiki section; this file must be in the root directory of your skin and cannot be renamed or your skin will not work

:::note Overriding pages from a skin
While the best way to override a specific page is using the `_base_override` folder, you can also override pages from your skin as well. This is helpful if you want your skin to make specific changes to a page that are only unique to your skin. See the [seamless substitution documentation](/docs/2.6/seamless-substitution) for more information about this process.
:::

### The QuickInstall file

Nova skins can include a `skin.yml` file which contains basic information about the skin that Nova can use to install the skin for a user.

- The `skin` attribute tells Nova the name of the skin, used for selecting the skin in the Site's Settings and in each user's Site Options.
- The `location` attribute tells Nova where the skin exists in the `application/views` directory. This value is case-sensitive, so be sure to copy the name of the directory exactly.
- The `credits` attribute is text that Nova uses on the credits page that should contain information about the author, where to find the skin, any attribution or inspiration, and any usage license that comes with the skin. This attribute can contain HTML code.

Here is an example QuickInstall file:

```yaml
skin: Titan
location: titan
credits: The Titan skin was created by Anodyne Productions. Edits are permissible provided the original credits remain intact.
version: 2.0
sections:
  -
    type: main
    preview: preview-main.jpg
  -
    type: wiki
    preview: preview-wiki.jpg
  -
    type: login
    preview: preview-login.jpg
  -
    type: admin
    preview: preview-admin.jpg
```

### Images

The best practice to follow when adding images to your skin will depend on how you plan to use the image.

Generally speaking, if the image is going to be accessed by each section of the skin, you should use the `_global` directory. This can include a skin's header image, a logo, or any other asset you'll use throughout the user interface.

If you'll only use the image in a specific skin section, it's probably best to place it in the relevant section's `images` directory.

:::tip
Images can take up a lot of space on your web host's server, using up resources and slowing down a page's load time. To provide a better experience for your users and to save resources on your hosting plan, consider resizing images to fit your skin.
:::

## CSS

:::tip Learning CSS
CSS is at the heart of making a skin look the way you want. Not sure what CSS is or how to write it? Don't worry, we have some [helpful links](/docs/2.6/helpful-links) with resources for learning CSS to master customizing your skins in no time.
:::

Stylesheets within skins can vary greatly between skin authors, but they can usually be found in a global folder or within one of the specific section folders. Each skin generally comes with five CSS files:

- `main.css` – the file that each template page calls; for simplicity, this contains links to the other CSS files in the directory
- `skin.css` – a stylesheet responsible for the visual elements of the skin such as color, fonts, and more
- `structure.css` – a stylesheet responsible for more of the low level structural elements of a skin such as margins, paddings, and more
- `jquery.ui.tabs.css` – a stylesheet that contains styles for the skin's tabs
- `jquery.ui.skin.css` – a stylesheet that provides support for jQuery UI skins

:::note
Unless the skin's CSS files are located in a global folder, you'll need to update each CSS file within each section for your changes to appear across the site. Keep in mind that each section may have specific styling that does not exist in another section's CSS files, so copy/pasting entire CSS files is not recommended.
:::

:::tip
If you updated a CSS file and do not see your changes on the site, make sure you updated the correct file and clear your browser's cache.
:::

## Templates

Template files provide the basic HTML structure of a skin, and thus what every user sees when they visit a Nova-based website. Templates generally have roughly 40 lines of PHP code preceding HTML that specify things like the locations of CSS and JavaScript files while also defining some crucial variables, like the Nova helper panel, that are used on a page. Content and code used within template files appear throughout a given Nova section, and are not specific to any one page.

### [WIP] Included files

- Information about the include files that are used to pull in some basic Javascript for each template

### Navigation

Nova uses two different navigation menus: the main navigation (`$main_nav`) and the secondary navigation (`$nav_sub`). The main navigation is consistent throughout the entire site, but the secondary navigation changes depending on the section the user is currently viewing. From a skining perspective, you won't need to know _what_ section is showing, just _where_ you want the secondary navigation to be shown on the page.

Navigation elements are rendered as an unordered list (`<ul>`) with each navigation element being a list item (`<li>`) containing an anchor (`<a>`) tag. Both navigations are contained within `div`s that can be targeted to style each list individually (`.nav-main` and `.nav-sub` respectively).

:::tip Heads up
Certain secondary navigation elements may have a space between sections. This can  provide additional challenges if improperly formatted.
:::

### Page Content

Each template file contains a section for the page's primary content. The page's content generally appears in a `div` with the class `.content` and contains three PHP elements: flash messages, the page content, and Ajax elements.

- The flash messages appear if Nova needs to generate an error or success message, which can be seen when you update a post or submit an application. They are styled as a div element with the class `.flash_message`, with an additional class of either `.flash-success`, `.flash_error`, or `.flash_info` that give color styles.
- The `$content` variable displays the page's content, whether it's text defined in a Nova's Site Messages, a custom/static generated through a separate view file, or one of Nova's pre-formatted content pages.
- Ajax can help update a page without a user having to reload, it can receive data after a page has loaded, and it can send data to your server. In general, you won't need to worry about this more than ensuring the `$ajax` variable is in your template.

## Tips and tricks

With a basic understanding of how a Nova skin works, you can now jump into customizing one for your Nova installation. Before you get started, here are a few tips that can help you in the development process.

### Inspect Element

Most browsers come with a tool called Inspect Element. This allows you to preview the rendered HTML structure and accompanying CSS of any page. You can use it to select a specific element within a page and customize accompanying styles. For example, you can use inspect element to find the main navigation and manipulate, in real time, changes to the navigation's text color, size, etc. It is a powerful tool that you can use to decide what styles work for you, and then you can copy the code into one of your skin's CSS files.

### `var_dump`

Since the backbone of Nova is PHP, knowing what each variable contains can be incredibly helpful in the theming process. PHP has a function called `var_dump()` that you can use to preview the raw content of any variable you see in a template or page file.

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
