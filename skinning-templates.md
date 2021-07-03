# Skinning Nova - Templates

A primer on how Nova templates structure your skin.

---

Template files provide the basic HTML structure of any skin. If your skin requires the DOM to be in a specific order or you need things moved around for your styles, this is where those changes would happen. Content and code used within template files appear throughout a given Nova section and are not specific to any one page of that section.

## Location

Template files **must** be at the root of your skin and **must** be named in the format `template_{section}.php` otherwise Nova will not be able to find the template file to use it.

## PHP code

At the top of every template file is several lines of PHP code that will tell the template file what the current skin is, where to look for the stylesheet, and more. In general, this can be copied from another template *of the same section* and placed in your skin without modification.

## Include files

The template file for a given section also has a line includes important CSS and JavaScript files for each section. If you remove this line, much of the dynamic behavior of your skin will stop working.

## Variables

Nova relies on using "regions" to know where to place different user interface elements and sections. The content of these variables it set from the controller and then rendered in the template. Below are the available region variables and which sections they can be used in:

|Variable        |Section(s)              |
|----------------|------------------------|
|`$ajax`         |admin, main, wiki       |
|`$content`      |admin, login, main, wiki|
|`$flash_message`|admin, login, main, wiki|
|`$javascript`   |admin, login, main, wiki|
|`$nav_main`     |admin, main, wiki       |
|`$nav_sub`      |admin, main, wiki       |
|`$panel_1`      |admin, main, wiki       |
|`$panel_2`      |admin, main, wiki       |
|`$panel_3`      |admin, main, wiki       |
|`$_redirect`    |admin, login, main, wiki|
|`$title`        |admin, login, main, wiki|

## Important template regions

### Navigation

Nova uses two different navigation menus: the main navigation (`$main_nav`) and the secondary navigation (`$nav_sub`). The main navigation is consistent throughout the entire site, but the secondary navigation changes depending on the section the user is currently viewing. From a skinning perspective, you won't need to know *what* section is showing, just *where* you want the secondary navigation to be shown on the page.

Navigation elements are rendered as an unordered list (`<ul>`) with each navigation element being a list item (`<li>`) containing an anchor (`<a>`) tag. Both navigations are contained within `div`s that can be targeted to style each list individually (`.nav-main` and `.nav-sub` respectively).

:::tip Heads up
Certain secondary navigation elements may have a space between sections. This can  provide additional challenges if improperly formatted.
:::

### Page content

Each template file contains a section for the page's primary content. The page's content generally appears in a `div` with the class `.content` and contains three PHP elements: flash messages, the page content, and Ajax elements.

- The flash messages appear if Nova needs to generate an error or success message, which can be seen when you update a post or submit an application. They are styled as a `div` element with the class `.flash_message`, with an additional class of either `.flash-success`, `.flash_error`, or `.flash_info` that give color styles.
- The `$content` variable displays the page's content, whether it's text defined in a Nova's Site Messages, a custom/static generated through a separate view file, or one of Nova's pre-formatted content pages.
- Ajax can help update a page without a user having to reload, it can receive data after a page has loaded, and it can send data to your server. In general, you won't need to worry about this more than ensuring the `$ajax` variable is in your template.

### User panel

Nova includes a handy user panel that contains quick access to links that users may want to get to quickly. In general most skin developers choose to simply copy the panel from their favorite skin and just change the look, but Nova does provide you with all of the tools and data to re-structure the user panel however you would like.

There are 3 panes included in the user panel that are represented by 3 different variables: `$panel_1`, `$panel_2`, and `$panel_3`. You can put these in any order you want or anywhere on the page.

There is also a `$panel` variable that contains the icon for a particular panel pane. (This information is actually set in each individual template, so you're free to change it.)

Triggering the panel is done with some simple jQuery that can also be found in each individual template.
