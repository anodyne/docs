---
title: Changing language items
description: Learn how to change the default language items.
layout: docs
---

When setting up your game, you realize that some of the terms don't line up with how your game wants to do things. You want to change some terms so that they're more consistent with what you call them. In this case, you want to change the term **mission** to **quest** and **mission group** to **saga**.

## Locate the items you wish to change

The way that language files work in Nova is that it's a big array. Each key of the array items is unique so that it can be referenced instead of the full string of text. The value of the array items is what's actually printed out on the page. For those without a lot of PHP experience, an array is broken down as follows:

```php
$array = array(
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3',
);
```

In order to change the language items, we need to first find the item we're looking to change so we make sure we have the right key. You'll need to open the language file located at `nova/modules/core/language/english/base_lang.php`. This is the primary language file and will store the majority of what you're looking to change. (If you're looking to change a longer piece of text, odds are its in one of the other files.) With the `base_lang.php` file open, you can use your text editor to search for what you're looking for. In this case, we want to search for *mission*.

Your search will probably return a few results, but the ones you're looking for are the ones that have array keys of `global_mission` and `global_missions`. Copy both of those items and head on to the next step.

## Change the items

Now that our clipboard has the original items, we can paste them in to the language file located in `application/language/english/app_lang.php`. Open it up and paste the two items at the bottom of the file. Now, we can change the **value** of the array items to what we want and save the file. Your file items will probably look a little something like this:

```php
$lang['global_mission'] = "quest";
$lang['global_missions'] = "saga";
```

Make sure you're only changing the **value** of the array item (what's on the right side of the equal side). If you change the key, your changes won't work.

{% note title="Why do I need to copy these files?" %}
We recommend that files in the `nova` directory and all of its subdirectory are never altered because of the mechanics of Nova's update process. When updating Nova, every item in the `nova` directory is wiped out and reset, If you make your changes within this directory, you would have to recreate these changes every single time you update the system. Placing your updates in the designated folder within the `application` directory will future-proof your changes when this needs to occur.
{% /note %}

## Upload

Now that you've made your changes, make sure the `app_lang.php` file is saved and then upload it to your server (or if you're editing it on the server, save the file). Head over to your Nova site and you should see that things should be changed.

## Menu items

You've changed your language items, but you might have noticed that select **menu items** did not change. This is because menu items are not stored among Nova's files; they're stored in the database. Any item stored in the database does not respect any custom language files.

To change the menu item(s), simply access Nova's control panel, locate **Menu Items** under the *Site Management* subheader, and edit any appropriate menu item from here.
