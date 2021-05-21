# Themeing - Templates

Learn how to theme Nova to match the style and spirit of your game.

---

Template files provide the basic HTML structure of a theme, and thus what every user sees when they visit a Nova-based website. Templates generally have roughly 40 lines of PHP code preceding HTML that specify things like the locations of CSS and JavaScript files while also defining some crucial variables, like the Nova helper panel, that are used on a page. Content and code used within template files appear throughout a given Nova section, and are not specific to any one page.

### [WIP] Included files

- Information about the include files that are used to pull in some basic Javascript for each template

### Navigation

Nova uses two different navigation menus: the main navigation (`$main_nav`) and the secondary navigation (`$nav_sub`). The main navigation is consistent throughout the entire site, but the secondary navigation changes depending on the section the user is currently viewing. From a themeing perspective, you won't need to know _what_ section is showing, just _where_ you want the secondary navigation to be shown on the page.

Navigation elements are rendered as an unordered list (`<ul>`) with each navigation element being a list item (`<li>`) containing an anchor (`<a>`) tag. Both navigations are contained within `div`s that can be targeted to style each list individually (`.nav-main` and `.nav-sub` respectively).

:::tip Heads up
Certain secondary navigation elements may have a space between sections. This can  provide additional challenges if improperly formatted.
:::

### Page Content

Each template file contains a section for the page's primary content. The page's content generally appears in a `div` with the class `.content` and contains three PHP elements: flash messages, the page content, and Ajax elements.

- The flash messages appear if Nova needs to generate an error or success message, which can be seen when you update a post or submit an application. They are styled as a div element with the class `.flash_message`, with an additional class of either `.flash-success`, `.flash_error`, or `.flash_info` that give color styles.
- The `$content` variable displays the page's content, whether it's text defined in a Nova's Site Messages, a custom/static generated through a separate view file, or one of Nova's pre-formatted content pages.
- Ajax can help update a page without a user having to reload, it can receive data after a page has loaded, and it can send data to your server. In general, you won't need to worry about this more than ensuring the `$ajax` variable is in your template.
