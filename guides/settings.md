---
title: Guides - settings
description: Understand all of Nova's settings.
layout: docs
section: Guides
---

## Appearance

The appearance settings allows you to customize the look of Nova to suit your game's personality and your personal taste.

### Theme

### Icon set

Nova makes heavy use of icons. To allow you more control over the way things look in Nova, you can change the icons to a different set.

#### Creating a new icon set

### Logo

### Date format

### Colors

Nova allows you to change the colors used to inject your game's personality into the admin system. You can choose a different color for any gray colors (these range from cool blue gray to a warm gray). You can also individually change the primary, danger, warning, and info colors to be whatever you want. We provide some balanced color shade palettes, but you're free to also provide a hex color and Nova will create a color shade palette for you.

### Font family

#### Uploading your own fonts to the server

Sometimes you may not want to use a third-party site to host your fonts. In those situations, you can upload the font files to your server and use those instead of Bunny Fonts or Google Fonts.

- All fonts are uploaded to the `dist/fonts` directory
- When uploading your font folder, naming is incredibly important
  - The folder name **MUST** be kebab-case (dashes instead of spaces, e.g. `nunito-sans`)
  - There **MUST** be a `font.css` stylesheet (this is where you'll set your `@font-face` rule(s))
  - In your `@font-face` rule(s), the name of the font **MUST** be a title-cased version of the folder name (e.g. `Nunito Sans`)
- You are free to organize your files inside your font folder however you want since you will reference them from your `font.css` stylesheet

Once you have uploaded your font folder, the dropdown in the `Use a font stored on your server` section will include the font you just uploaded.

### Avatar shape
