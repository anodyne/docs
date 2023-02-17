---
title: Seamless substitution
description: Learn about how you can tell Nova to use a different version of a file instead of what's in the Nova core.
layout: docs
section: Core Concepts
---

The term "seamless substitution" sounds scarier than it actually is. In a nutshell, this is *how* Nova looks for files. Instead of always pulling files out of the Nova core, Nova looks in a few different locations *before* looking in the core for a file. If Nova finds a file named the same as the one it's looking for somewhere other than the Nova core, it'll use the first file it finds.

A system like this is integral to allowing games to modify Nova's core behavior and presentation. This is especially important since editing core Nova files runs the risk of having customizations wiped out when a Nova update is applied.

## Where Nova will look

For each type of file below, Nova will try to find that type of file in the specified locations and in the specified order.

### Ajax (asynchronous views)

- `application/views/{current_skin}/{section}/ajax`
- `application/views/_base_override/{section}/ajax`
- `nova/modules/core/views/_base/{section}/ajax`

### Asset images

- `application/assets`

### Combadge images

- `application/views/{current_skin}/{section}/images`
- `application/assets/common/{genre}/images`
- `nova/modules/core/views/_base/{section}/images`

### Emails

- `application/views/_base_override/emails/{type}`
- `nova/modules/core/views/_base/emails/{type}`

{% note title="A note about emails" %}
Emails are available in both `html` and `text` form. If you are modifying an email, you will need to make any changes in both the HTML and text files. Check out the [email documentation](/docs/2.6/emails) for more information about Nova's emails.
{% /note %}

### Images

- `application/views/{current_skin}/{section}/images`
- `application/views/_base_override/{section}/images`
- `nova/modules/core/views/_base/{section}/images`

### Javascript

- `application/views/{current_skin}/{section}/js`
- `application/views/_base_override/{section}/js`
- `nova/modules/core/views/_base/{section}/js`

### Rank images

- `application/assets/common/{genre}/ranks/{set}`

### Pages

- `application/views/{current_skin}/{section}/pages`
- `application/views/_base_override/{section}/pages`
- `nova/modules/core/views/_base/{section}/pages`

## How to use a different file

Leveraging seamless substitution is simple: add the file you want to use (with the same name as Nova uses in the core) at a location higher in the corresponding list above than the Nova core location.

For example, if you wanted to replace the clock icon used in the admin section, you would simply add your new `clock.png` image at the following location:

`application/views/_base_override/admin/images`

When you refresh a page with that image, you'll see your new image instead of what Nova uses in the core.

### Base override vs skin

The `_base_override` directory should be used if you want to replace a file across the entire system, regardless of skin. This is the simplest and quickest way to replace an image or file with your own version.

If you're a skin developer and want only your skin to have a different version of an image or file, you can add the necessary file structure to your skin and put the file(s) there. Whenever your skin is in use, Nova will use the version of the file(s) found in your skin instead of what's in the Nova core.
