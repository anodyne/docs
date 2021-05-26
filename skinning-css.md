# Themeing - CSS

Learn how to skin Nova to match the style and spirit of your game.

---

:::tip Learning CSS
CSS is at the heart of making a skin look the way you want. Not sure what CSS is or how to write it? Don't worry, we have some [helpful links](/docs/2.6/helpful-links) with resources for learning CSS to master customizing your skins in no time.
:::

Stylesheets within skins can vary greatly between skin authors, but they can usually be found in a global folder or within one of the specific section folders. Each skin generally comes with five CSS files:

- `main.css` – the file that each template page calls; for simplicity, this contains links to the other CSS files in the directory
- `skin.css` – a stylesheet responsible for the visual elements of the skin such as color, fonts, and more
- `structure.css` – a stylesheet responsible for more of the low level structural elements of a skin such as margins, paddings, and more
- `jquery.ui.tabs.css` – a stylesheet that contains styles for the skin's tabs
- `jquery.ui.theme.css` – a stylesheet that provides support for jQuery UI themes

:::note
Unless the skin's CSS files are located in a global folder, you'll need to update each CSS file within each section for your changes to appear across the site. Keep in mind that each section may have specific styling that does not exist in another section's CSS files, so copy/pasting entire CSS files is not recommended.
:::

:::tip
If you updated a CSS file and do not see your changes on the site, make sure you updated the correct file and clear your browser's cache.
:::
