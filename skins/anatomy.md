---
title: Anatomy of a Nova skin
description: Learn about all of the files included in a Nova skin.
layout: docs
---

Learn about all of the files included in a Nova skin. {% .lead %}

---

As a skin author, you're free to structure your skin however you see fit. Through much trial and error though, we've found a structure like the one described below to be the most flexible way to approach building a Nova skin.

## Root folder

- `_global` - files used across multiple sections of the skin; you can name this directory whatever you want, but we've found `_global` to be the best option
- `admin` – files specific to the admin section of Nova; this directory cannot be renamed
- `login` – files specific to the login section of Nova; this directory cannot be renamed
- `main` – files specific to the main section of Nova; this directory cannot be renamed
- `wiki` – files specific to Nova's wiki; this directory cannot be renamed
- `preview-admin.jpg` – a preview image of the admin section (only used when selecting a skin); this image must be in the root directory of your skin and cannot be renamed or Nova will not be able to show a preview of the skin section to users
- `preview-login.jpg` – a preview image of the login section (only used when selecting a skin); this image must be in the root directory of your skin and cannot be renamed or Nova will not be able to show a preview of the skin section to users
- `preview-main.jpg` – a preview image of the main section (only used when selecting a skin); this image must be in the root directory of your skin and cannot be renamed or Nova will not be able to show a preview of the skin section to users
- `preview-wiki.jpg` – a preview image of the wiki section (only used when selecting a skin); this image must be in the root directory of your skin and cannot be renamed or Nova will not be able to show a preview of the skin section to users
- `skin.yml` – the QuickInstall file used by Nova to [install the skin](/docs/2.6/skinning-install)
- `template_admin.php` – the base HTML structure of the admin section (this file must be in the root directory of your skin and cannot be renamed or your skin will not work); see [here](/docs/2.6/skinning-templates) for more information about skin templates
- `template_login.php` – the base HTML structure of the login section (this file must be in the root directory of your skin and cannot be renamed or your skin will not work); see [here](/docs/2.6/skinning-templates) for more information about skin templates
- `template_main.php` – the base HTML structure of the main section (this file must be in the root directory of your skin and cannot be renamed or your skin will not work); see [here](/docs/2.6/skinning-templates) for more information about skin templates
- `template_wiki.php` – the base HTML structure of the wiki section (this file must be in the root directory of your skin and cannot be renamed or your skin will not work); see [here](/docs/2.6/skinning-templates) for more information about skin templates

## Section folders

- `ajax` - files that should be used to replace system Ajax files for your skin only; this is part of the [seamless substitution](/docs/2.6/seamless-substitution) system
- `css` - CSS files used for the changing the look of the skin section
- `images` - any images used for the skin section
- `js` - files that should be used to replace system JavaScript files for your skin only; this is part of the [seamless substitution](/docs/2.6/seamless-substitution) system
- `pages` - files that should be used to replace system view files for your skin only; this is part of the [seamless substitution](/docs/2.6/seamless-substitution) system

{% callout title="Overriding pages from a skin" %}
While the best way to override a specific page is using the `_base_override` folder, you can also override pages from your skin as well. This is helpful if you want your skin to make specific changes to a page that are only unique to your skin. See the [seamless substitution documentation](/docs/2.6/seamless-substitution) for more information about this process.
{% /callout %}

## Images

The best practice to follow when adding images to your skin will depend on how you plan to use the image.

Generally speaking, if the image is going to be accessed by multiple sections of the skin, we recommend using the `_global` directory. This can include a skin's header image, a logo, or any other asset(s) you'll use throughout the user interface. If you'll only use the image in a specific section of the skin, it's probably best to place it in the relevant section's `images` directory.

{% callout title="A tip about images" %}
Images can take up a lot of space on your web host's server, using up resources and slowing down a page's load time. To provide a better experience for your users and to save resources on your hosting plan, consider resizing images to fit your skin and optimizing them for use on the web.
{% /callout %}
