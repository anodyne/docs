---
title: Forms
description: Learn about Nova's dynamic forms and how to get the most out of them.
layout: docs
---

Nova's forms are an extremely powerful tool in Nova's arsenal, powering the templates used in the character creation process to providing information about the ship, station, or even cities that the game is set in. These customizable forms enable anyone to easily standardize what information should and shouldn't be collected and displayed to the game's players.

There are four major forms currently provided in Nova:

- **Bio**: the Character Bio allows any user to create and modify characters of their own design. This form is also publicly available through Nova's "join" process to allow potential players to submit a fully developed character already templated to the game's standards as part of an application process to the game manager.
- **Specifications**: this is a common feature among science-fiction genres such as Star Trek and Firefly where the specifications of the "hero" starship or vessel can be made available to the players as reference material. This can easily be adapted to fantasy genres, such as Dungeons and Dragons, to describe whole environments or key locations. This form is typically reserved for those who are managing the game.
- **Tour**: this allows images and background information for select locations (such as the bridge, engine room, or tavern) to be displayed to the player. This form is typically reserved for those who are managing the game.
- **Docking Form**: this is available to games who operate as a large station, such as Star Trek's Deep Space Nine. Other Nova games can "dock" with a station game using this form, but neither game will be able to share information with each other.

## Permissions

To edit any form in Nova, you must have at least the *System Administration* access role, or your access role needs to have the appropriate form management (such as *Bio/Join Form*, *Specs Form*, etc.) feature(s) enabled. Typically, this feature is reserved for those who are managing the game.

If you wish to learn how to submit a new character to a game, please review [Using Characters](/using-characters.md) in the Using Nova section.

## Creating and editing fields

Each existing and new field is fully customizable to suit the needs of the form and/or imputable item. To add a field to any form, access Nova's control panel and locate any one of the four forms under the *Site Management* subheading.
![Form pages](/images/docs/2.7/using-forms/forms-location.png)

To add a field, click on *Add `{form}` Field*, where `{form}` equals the name of the form you are editing.
![Add a field](/images/docs/2.7/using-forms/field-addfield.png)

To edit an existing field, click on the Edit icon to the far right of the field. To delete a field, select the delete icon.
![Edit or delete a field](/images/docs/2.7/using-forms/edit-delete.png)

Whenever you wish to add or edit a field, the following options will always be available:

- **Primary Attributes**:
  - *Section*: the section of the form that this field will be assigned to.
  - *Field Type*: three types are available for each field:
    - *Text Field*: typically used for items such as Name, Age, etc.
    - *Text Area*: typically used for items such as Personal History, Class Information, etc.
    - *Dropdown Menu*: typically used for a selectable range of items such as Gender.
  - *Page Label*: the label that will be displayed on the form entry page.
  - *Order*: the position that the new field will hold within the specific section. Enter a number ranging from `0` (top of the list) to `99` (bottom of the list).
  - *Display*: determine if you want this field to appear for you or your players on the entry page.
- **HTML Attributes**:
  - *Name*: the name of the attribute to be listed within the page's rendered code. This name must be a unique name, not used elsewhere in the entire form.
  - *ID*: a selectable anchor for the field contained within the page's rendered code. This name must be a unique name, not used elsewhere in the entire form.
  - *Class*: a specific class to be rendered according to functions added to the skin's CSS.
  - *Textarea Rows*: determine how many rows should be available to the user using the form.

{% callout title="For dropdown menus only" %}
For dropdown menus, please provide the values to be used by the menu. Each item should be on a separate line and have a comma-separated set of values, like: `male,Male`. In that example, the menu item's value would be male and the label seen in the menu would be Male. Your final output should look like:

```php
male,Male
female,Female
neuter,Neuter
```
{% /callout %}

When all edits are complete, select **Submit**.

## Creating and editing sections

Some forms, such as Bios and Specs, utilize sections to compartmentalize the inputable information. Such examples include Physical Appearance, Character Background, and Dimensions. To manage these sections, access the appropriate form editor, and then select **Manage Sections**.
![Section form](/images/docs/2.7/using-forms/sections.jpg)

You will be taken to a new page where you can add new sections or edit existing ones. To add a section, click on *Add `{form}` Section*, where `{form}` equals the name of the form you are editing.
![Section management](/images/docs/2.7/using-forms/sections-add.jpg)

To edit an existing section, click on the Edit icon to the far right of the section. To delete a section, select the delete icon.
![Edit or delete a field](/images/docs/2.7/using-forms/edit-delete.png)

## Creating and editing tabs

The Bio form utilizes tabs that allow players to move to particular sections of a character's bio. This is extremely helpful as many quality bios can be quite lengthy, or perhaps the management team would prefer quicker access to certain information. To manage this section, access the Bio Form page through Nova's control panel and click on **Manage Bio Tabs**.
![Tab management](/images/docs/2.7/using-forms/tabs-location.png)

To add a add, click on *Add Bio Tab*.
![Add a tab](/images/docs/2.7/using-forms/tabs-add.png)

To edit an existing section, click on the Edit icon to the far right of the tab. To delete a tab, select the delete icon.
![Edit or delete a field](/images/docs/2.7/using-forms/edit-delete.png)
