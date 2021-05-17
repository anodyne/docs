# Themeing

Learn how to theme Nova to match the style and spirit of your game.

---

## What is a theme?

A theme (also known as a skin) is the HTML, CSS, and Javascript behind every Nova page. It provides the site with a basic structure, style, and even a certain level of functionality. Themes can be found in the `/application/views` directory.

## Anatomy of a theme

Theme authors are free to structure their themes in whatever manner they see fit. In general though we recommend a structure like this:

- `_global` - this should contain files used across different sections of the theme including CSS, Javascript, and images
- `admin` – contains any files specific to the admin section of Nova
- `login` – contains any files specific to the login section of Nova
- `main` – contains any files specific to the main section of Nova
- `wiki` – contains any files specific to Nova's wiki
- `preview-admin.jpg` – a preview image of the admin section (this is only used when selecting a theme from the theme catalogue)
- `preview-login.jpg` – a preview image of the login section (this is only used when selecting a theme from the theme catalogue)
- `preview-main.jpg` – a preview image of the main section (this is only used when selecting a theme from the theme catalogue)
- `preview-wiki.jpg` – a preview image of the wiki section (this is only used when selecting a theme from the theme catalogue)
- `skin.yml` – the QuickInstall file Nova uses to install the theme (see below for more information)
- `template_admin.php` – the base HTML structure of the admin section
- `template_login.php` – the base HTML structure of the login section
- `template_main.php` – the base HTML structure of the main section
- `template_wiki.php` – the base HTML structure of the wiki section

:::note Overriding pages from a theme
While the best way to override a specific page is using the `_base_override` folder, you can also override pages from your theme as well. This is helpful if you want your theme to make specific changes to a page that are only unique to your theme. See the [seamless substitution documentation](/docs/2.6/seamless-substitution) for more information about this process.
:::

### The QuickInstall file

Nova themes can include a `skin.yml` file which contains basic information about the theme that Nova can use to install the theme for a user.

- The `skin` attribute tells Nova the name of the theme, used for selecting the theme in the Site's Settings and in each user's Site Options.
- The `location` attribute tells Nova where the theme exists in the `application/views` directory. This value is case-sensitive, so be sure to copy the name of the directory exactly.
- The `credits` attribute is text that Nova uses on the credits page that should contain information about the author, where to find the theme, any attribution or inspiration, and any usage license that comes with the theme. This attribute can contain HTML code.

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

The best practice to follow when adding images to your theme will depend on how you plan to use a given image. If the image needs to be accessed globally (by each theme section), place the file in the global folder. This can include a theme's a header image, a logo, or any other image asset you'll use throughout the user interface. If you only need an image on a specific theme section, place it in the relevant section's image folder. For example, on the Titan theme the wiki section uses a different header image that can be found in `/titan/wiki/images/header-bg.jpg`.

:::tip
Images can take up a lot of space on your web host's server, using resources and slowing down a page's load time. To provide a better experience for your users and to save resources on your hosting plan, consider resizing images to fit your theme.
:::

## CSS

Stylesheets within themes also vary between theme authors, but they can usually be found in a global folder or within one of the specific section folders. Each theme usually comes with five CSS files:

- `main.css` – the file that each template page calls, containing links to the other files within the CSS folder.
- `skin.css` – the primary stylesheet of a theme
- `structure.css` – a stylesheet that contains structural elements of a theme, including buttons, tables, form inputs, and more
- `jquery.ui.tabs.css` – a stylesheet that contains styles for the theme's tabs, commonly seen on character pages, the join form, and the admin dashboard
- `jquery.ui.theme.css` – a stylesheet that provides support for certain jQuery functions

:::note
Unless the theme's CSS files are located in a global folder, you must update each CSS file within each section folder for your changes to appear across the website. Keep in mind that each section may have specific styling that does not exist in another section's CSS files, so copy/pasting entire CSS files is not recommended.
:::

:::tip
If you updated a CSS file and do not see your changes on the site, make sure you updated the correct file and clear your browser's cache.
:::

## Templates

Template files provide the basic HTML structure of a theme, and thus what every user sees when they visit a Nova-based website. Templates generally have roughly 40 lines of PHP code preceding HTML that specify things like the locations of CSS and JavaScript files while also defining some crucial variables, like the Nova helper panel, that are used on a page. Content and code used within template files appear throughout a given Nova section, and are not specific to any one page.

### Navigation Elements

Nova uses two navigation elements in any given template file. The main navigation, using the variable `$main_nav`, and the sub navigation, using the variable `$nav_sub`. The main navigation is the consistent throughout the website, but the sub navigation changes depending on the section. For example, within the `template_main.php` file, the variable `$sub_nav` will refer to the distinct sub navigation elements assigned to the main, sim, and personnel sections.

Navigation elements are rendered as an unordered list (`<ul>`), with each navigation element being a list item (`<li>`) containing an anchor (`<a>`) tag. Both navigations are contained within divs that can be used to style each list, they appear under `.nav-main` and `.nav-sub` respectively.

:::tip
Certain sub navigation elements may have a space between each "section" and can provide challenges if improperly formatted.
:::

### Page Content

Each template file contains a section for the page's primary content, which varies depending on the page accessed. The page's content generally appears in a div with the class `.content` and contains three PHP elements: flash messages, the content itself, and Ajax.

- The flash messages appear if Nova needs to generate an error or success message, which can be seen when you update a post or submit an application. They are styled as a div element with the class `.flash_message`, with an additinal class of either `.flash-success`, `.flash_error`, or `.flash_info` that give color styles.
- The `$content` variable displays the page's content, whether it's text defined in a Nova's Site Messages, a custom/static generated through a separate view file, or one of Nova's pre-formatted content pages.
- Ajax can help update a page without a user having to reload, it can receive data after a page has loaded, and it can send data to your server.

## Tips and tricks

With a basic understanding of how a Nova theme works, you can now jump into customizing one for your Nova installation. Before you get started, here are a few tips that can help you in the development process.

### Inspect Element

Most browsers come with a tool called Inspect Element. This allows you to preview the rendered HTML structure and accompanying CSS of any page. You can use it to select a specific element within a page and customize accompanying styles. For example, you can use inspect element to find the main navigation and manipulate, in real time, changes to the navigation's text color, size, etc. It is a powerful tool that you can use to decide what styles work for you, and then you can copy the code into one of your theme's CSS files.

### `var_dump`

Since the backbone of Nova is PHP, knowing what each variable contains can be incredibly helpful in the theming process. PHP has a function called `var_dump()` that you can use to preview the raw content of any variable you see in a template or page file.

For example, if you wanted to inspect the contents of the `$panel` variable you'd be able to put this code anywhere in your tempate file:

```php
var_dump($panel);
```

And you'd be returned with the following raw data:

```php
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
