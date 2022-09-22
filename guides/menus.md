---
title: Using menus
description: Learn more about how to configure and customize navigation menus in Nova.
layout: docs
---

{% $markdoc.frontmatter.description %} {% .lead %}

---

Nova's robust structure is strategically divided throughout multiple sections of the site, all of which accessible through a carefully crafted navigational structure. This structure is built upon even the most basic installation, and is easily modifiable to meet the needs of every game.

## Permissions

To edit any menu item in Nova, you must have at least the *System Administration* access role, or your access role needs to have the appropriate setting management (such as *Menus*, etc.) feature(s) enabled. Typically, this feature is reserved for those who are managing the game.

To access your site's menu items, access Nova's control panel and locate *Menu Items* under the subheading *Site Management*.
![Settings location](/images/docs/2.7/using-menus/menu-location.png)

## Menu categories

All menu items are sorted into categories for organizational and operational purposes. These categories are represented as sub-menu navigation areas placed throughout Nova.

To access all categories within Nova, access the Menu Items page, and select *Manage Menu Categories*.
![Categories location](/images/docs/2.7/using-menus/menu-categorylocation.png)

Nova ships with the following categories:

- *Main*: located on your site's *Main* page.
- *Personnel*: located on your site's *Personnel* page.
- *The Sim*: located on your site's *Sim* page.
- *Admin Control Panel*: located on your site's *Control Panel* page and each page of the *Admin* portion of the site.
- *Write*: located on your site's *Control Panel* page and each page of the *Admin* portion of the site.
- *Private Messages*: located on your site's *Control Panel* page and each page of the *Admin* portion of the site.
- *Site Management*: located on your site's *Control Panel* page and each page of the *Admin* portion of the site.
- *Management*: located on your site's *Control Panel* page and each page of the *Admin* portion of the site.
- *Characters*: located on your site's *Control Panel* page and each page of the *Admin* portion of the site.
- *User*: located on your site's *Control Panel* page and each page of the *Admin* portion of the site.
- *Reports*: located on your site's *Control Panel* page and each page of the *Admin* portion of the site.
- *Wiki*: located on your site's *Wiki* page and each page of the *Wiki* portion of the site.

### Editing menu categories

To edit any existing menu category, select *Manage Menu Categories* from the Menu Items page.
![Categories location](/images/docs/2.7/using-menus/menu-categorylocation.png)

Locate the category you wish to edit and click on the pencil "edit" icon.

The following options are available:

- *Name*: change the name of the category.
- *Order*: the position that the category will hold within the specific section. Enter a number ranging from `0` (top of the list) to `99` (bottom of the list).
- *Category*: select from the existing available categories that are available.
- *Type*: select from the following options to determine this category's usage:
  - *Sub Navigation*: this category will appear in the subnavigation of the selected portion of the site.
  - *Admin Sub Navigation*: this category will appear in the subnavigation of the Admin portion of the site.

When all edits are complete, select **Submit.**

### Adding menu categories

To add a new category, select *Add Menu Category*.
![Add new category](/images/docs/2.7/using-menus/menu-newcategory.png)

A modal will appear in the center of the page, allowing you to enter all appropriate information. The options available here are the same as what is available when editing a category.

When all edits are complete, select **Submit.**

{% callout title="Note" %}
When a new category is added, it is not added to the available category dropdown. The values in this dropdown cannot be changed, and are tied to the already created sections of the site (main, personnel, sim, etc.)
{% /callout %}

## Menu items

To access your site's menu items, access Nova's control panel and locate *Menu Items* under the subheading *Site Management*.
![Settings location](/images/docs/2.7/using-menus/menu-location.png)

All menu items are organized into three groups.
![Settings location](/images/docs/2.7/using-menus/menu-tabs.png)

- *Main Navigation*: these are top-level links to sections or specific pages. This is rendered as the main navigation bar that will be displayed throughout Nova.
- *Sub Navigation*: these sub-navigation items will vary based on what section of Nova you are currently in. For example, if you are on the *Personnel* page, you will only be able to see menu items in the Personnel category within that page's subnavigation.
- *Admin Sub Navigation*: these items will appear only when a user is accessing Nova's control panel and related pages connected to the administrative section of the site, and if the user has the appropriate access level to view or make changes to that section.

### Editing menu items

Locate the menu item you wish to edit and click on the pencil "edit" icon. A modal will appear in the middle of the screen with the following options:

- *Name*: the visible name of the menu item or link.
- *Link*: the location of the page you wish to link to. For example, if you are creating a page for the page we create in the [creating a page tutorial](/creating-pages.md) tutorial, we would enter `sim/all_awards`.
- *Link Type*: select whether or not the menu item will be linking to a page contained within your site or an external site.
- *Grouping & Sorting*:
  - *Group*: if you wish to group various menu items together, assign it to a group number here.
  - *Order*: the position that the menu item will hold within the specific section. Enter a number ranging from `0` (top of the list) to `99` (bottom of the list).
  - *Display*: determine whether or not this menu item will be displayed. This feature is best used when you want to remove an item from view, but not delete it from Nova altogether.
- *Type & Category*:
  - *Type*: select which type of link this Menu Item will be, whether it is part of Main Navigation, or either of the Sub Navigation sections.
  - *Category*: select which menu category this menu item will belong to.
- *Access Control*: you can choose the login requirement as well as if a menu item requires access control. For the access control URL, you can put the URL of the page (controller/method) or the URL of another page.
  - *Login Requirement*: determine is a user must be logged out, in, or if there is no requirement to view this link.
  - *Use Access Control*: select whether or not a user must be of a certain level to view or use this menu item.
  - *Access Control URL*: if Use Access Control is enabled, you can insert the URL of the page or the URL of another page.
  - *Access Control Level*: **NEED HELP HERE**
- *Sim Type*: select the appropriate sim type for the menu item. For example, if this menu item is only applicable for a **Colony** sim, you can select that from the list. If you decide to change from a colony sim to a base sim, Nova will automatically deactivate the menu item for you. If you want your menu item to be available for all game types, select **All**.

When all edits are complete, select **Submit.**

### Adding menu items

To add a new menu item, select *Add Menu Item*.
![Add new item](/images/docs/2.7/using-menus/menuitems-newitem.png)

A modal will appear in the center of the page, allowing you to enter all appropriate information. The options available here are the same as what is available when editing a menu item.

When all edits are complete, select **Submit.**
