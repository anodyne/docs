---
title: Using manifests
description: Learn more about Nova's powerful manifest structure, including how its structured with departments and positions.
layout: docs
---

Young or old, every game will feature a wide variety of characters. Each character brings a unique flavor and skill-set to that environment. Nova's manifest structure provides a way to list those characters in an easy-to-organize manner to allow for any player or user to freely locate and access information for any of the characters used in a Nova game.

The organizational structure is comprised of three elements:

- *Manifests*: the overarching container for a broad collection of characters of a certain type.
- *Departments*: a group of characters that are united for a similar purpose.
- *Positions:* the heart and soul of Nova's character system which immediately identifies the function of each character.

## Permissions

To edit any manifest, department, and position in Nova, you must have at least the *System Administration* access role, or your access role needs to have the appropriate setting management (such as *Site Manifests*, *Manage Departments*, *Manage Positions* etc.) feature(s) enabled. Typically, this feature is reserved for those who are managing the game.

## Manifests

Site manifests are an easy and the most basic way to organize characters within your game. Manifests can be created for almost anything and can be as broad or as granular as you wish. Manifests are viewable by anyone on your site, from active players to prospective members. This is done by accessing the Personnel page from Nova's main menu, located on all pages of the site.

Nova ships with only the **Primary Manifest** created and enabled. Common customizations among many games include a manifest for *Guest Characters*, characters that may be used only during a particular story. In *Star Trek* games, for example, a sim based on a starbase may have manifests for attached starships, such as *Deep Space Nine* would have the *USS Defiant*.

When a manifest is viewed, the user will only see the characters that are attached to each manifest's associated departments and positions.

### Creating and editing

To access any of the manifests available on Nova, access Nova's control panel and locate *Site Manifests* under the subheading *Site Management*.
![Site manifests location](/images/docs/2.7/using-manifests/manifests-location.png)

To create a manifest, select the *Add Manifest* option.

To edit existing manifests, click on the Edit icon to the far right of the manifest you wish to edit. To delete a manifest, select the appropriate delete icon.
![Edit or delete a field](/images/docs/2.7/using-forms/edit-delete.png)

Whenever you select the Add or Edit Manifest, the following options will appear:

- *Name*: the name of the manifest.
- *Order*: the position that the current manifest will hold within the list of available manifests. Enter a number ranging from `0` (top of the list) to `99` (bottom of the list).
- *Display*: determine if you want this manifest to appear for you or your players on the Personnel page.
- *Default Manifest*: if selected, this manifest will always appear first when viewing the Personnel page, no matter what position it has within the order.
- *Description*: descriptive text which describes the purpose and/or function for the manifest.
- *Header Content*: if you wish to have specific text at the top of the manifest before displaying any characters, enter that information here.
- *Default View*: this will determine what will be visible, by default, to any user viewing the Personnel page. The available options are:
  - *Active Characters only*: displays only primary characters assigned to active users.
  - *NPCs only*: displays only secondary characters, both attached and unattached.
  - *Open Positions only*: will only display positions which the management team is hoping to fill within the game.
  - *Inactive Characters only*: displays only primary characters for user accounts that have been placed into inactive status.
  - *Active Characters & NPCs*: displays both primary characters assigned to active users, and any secondary characters assigned to positions within the selected manifest.
  - *Active Characters, NPCs, and Open Positions*: displays all characters and open positions within the selected manifest.
  - *NPCs and Open Positions*: displays both secondary characters and positions without a character assigned within the selected manifest.
- *Manifest Metadata*: you can specify additional information to be displayed on the manifest by entering the field's HTML name (found under HTML Attributes when editing a bio form field) and separating fields with a pipe (|). Information will be displayed in the order specified (i.e. species|gender).

When you have finished entering your information, click on the **Submit** button.

If a manifest has metadata enabled, such as species and gender, the metadata will appear under the character names listed in the manifest.
![Metadata location](/images/docs/2.7/using-manifests/metadata-location.png)

## Departments

Departments act as dividers within a manifest, organizing a particular group of characters. Typical departments within a *Star Trek* game would be Command, Security, or Science. A game set in the *Battlestar Galatica* universe would have departments for the Viper and Raptor Wings, as well as the Hangar Deck Staff.

{% callout title="Note" %}
In order to display properly, each manifest must have at least one department enabled.
{% /callout %}

### Creating and editing

To access any of the departments available on Nova, access Nova's control panel and locate *Departments* under the subheading *Management*.
![Departments location](/images/docs/2.7/using-manifests/departments-location.png)

When the page is accessed, you will be able to see all departments stored within Nova's database. These departments are organized by whether or not they are assigned to a certain manifest. Within the Assigned tab, you can see all departments organized by which manifest they are attached to.

![Departments page](/images/docs/2.7/using-manifests/departments-page.png)

To add a department, select the *Add Department* option.
![Add department](/images/docs/2.7/using-manifests/departments-add.png)

To edit a department, click on the Edit icon to the far right of the department you wish to edit. To delete a department, select the appropriate delete icon.

{% callout title="Warning" type="warning" %}
Deleting and updating departments could negatively affect other departments, positions, and characters. Proceed with caution.
{% /callout %}

If you would like to copy a department and its positions for use in another manifest, such as duplicating Departments across a starbase's attached starships, you can use the duplicate button.

{% callout title="Quick tip" %}
Once you've duplicated a department, you should change the description to make it clear which manifest it's associated with.
{% /callout %}

Whenever you select the Add or Edit Deparment options, the following options will appear:

- *Name*: the name of the department.
- *Order*: the position that the current department will hold within the list of available departments. Enter a number ranging from `0` (top of the list) to `99` (bottom of the list).
- *Type*: determine whether or not the positions or purpose for this department is for playing (primary) characters or non-playing (secondary) characters.
- *Parent Department*: select if this department requires a parent department (such as Counseling under the Medical Department) or if it this department can stand on its own within a manifest.
- *Display*: determine if you want this department to appear for you or your players on the Personnel page. Be aware, if a department is set to not display, then any position attributed to this department will not appear on the Personnel page, or in any dropdowns throughout the site.
- *Description*: enter a description of what the department's purpose is to help your players understand what it is for.

When you have finished entering your information, click on the **Submit** button.

### Assigning departments

Departments must be attached to a manifest in order for them to be displayed on the Personnel page, or for their positions to appear as options in the join form. Departments can be assigned to a manifest either by directly editing the department by using the department management page.

To access the *Assign Departments* page, access Nova's control panel and locate *Site Manifests* under the subheading *Site Management*.
![Site manifests location](/images/docs/2.7/using-manifests/manifests-location.png)

Then select the *Assign Departments* option.
![Assign departments](/images/docs/2.7/using-manifests/departments-assign.png)

From here you can assign departments to a specific manifest. To do so, simply drag the department to the desired manifest. All changes will be immediately saved within Nova, so there will be no need to update. The user interface, however, will not automatically clean itself up, or properly arrange the departments within a manifest. To clean up the presentation of the page, click on the *Refresh Page* at any time.
![Arrange departments](/images/docs/2.7/using-manifests/departments-arrange.png)

## Positions

Positions are the heart and soul of Nova's character system. Not only does a position define a character's primary function within the story, these positions are integral to how manifests themselves are presented to users. Positions are also required for any character to exist within Nova, and any character application must also be tied to an available position.

Many games can only support a certain amount of a character type. For example, a Dungeons and Dragons game works best when there is a variety of wizards, rogues, and warriors. Likewise, a *Star Trek* game typically has one Captain and one head per department, such as a Chief Medical Officer. If a game was based on Inferno Squadron from *Star Wars*, the positions could be based upon the soldier's specialty, such as munitions or sniper.

### Creating and editing

To access any of the positions available on Nova, access Nova's control panel and locate *Positions* under the subheading *Management*.
![Departments location](/images/docs/2.7/using-manifests/positions-location.png)

{% callout title="Warning" type="warning" %}
Deleting and updating positions could negatively affect characters. Proceed with caution.
{% /callout %}

Whereas manifests and departments provide the structural containers for character organization, positions are the true building blocks of Nova's character system. Nova immediately displays for you the most used elements: the *name* and *open slots*. If additional editing is required, you can click on the **More** button to see the remainder of the editable options. Once all updates within a department is complete, scroll to the bottom of the positions list and click **Update**.

Positions are organized in this management section via departments. All departments, regardless of their display status, are accessible through this page, allowing you to freely enter and edit their positions as you desire.

To add a position, select the *Add Position* option located under the Departments listing.

To edit a position, navigate to the department in which the position is located, then locate the position you wish to edit. When your information has been entered, click the **Submit** button, and then click the **Update** button at the bottom of the position listings to refresh the listings and apply the updates.

To delete a position, locate the position you wish to delete. Click on the *Delete?* checkbox. Once you have selected all positions within a department you wish to delete, click on the **Update** button.

{% callout title="Quick tip" %}
For best results, you will want to make your changes one department at a time. If you navigate between departments without submitting your changes, Nova will not save your work.
{% /callout %}

Whether you are adding or editing a position, the following options are always available:

- *Name*: the name or title of the position, i.e. Commanding Officer, Pilot, Demolitions Specialist.
- *Deparment*: the department the position will be assigned to.
- *Type*: select between *Senior*, *Officer*, *Enlisted*, or *Other* to determine which class the position falls under.
- *Open Slots*: determine how many characters can be assigned to this position, up to a maximum of 50. For example, there may be only 1 Chief Engineer, but there could be 10 Computer System Specialists. Nova will track the number of characters assigned to this position, and, once the maximum number is reached, will remove the position as a selectable option for new characters.
- *Top Open Position*:
- *Order*: the position that the current position will hold within the department listing. Enter a number ranging from `0` (top of the list) to `99` (bottom of the list).
- *Display*: determine if you want this position to appear for you or your players on the Personnel or Join pages. Be aware, if a position is set to not display, then any character attributed to this department will not appear on the Personnel page.
- *Description*: enter a description of what the positions's purpose is or a job description to help your players understand how the position is to be used in the game.

{% callout title="Display or delete?" %}
Many games change over time, and so do the available position options. If you think there is a possibility you may use a department or position in the future, your best option may be to set the Display option to off. This way, you can reenable the option later on in the game to make the position(s) available to your players and retain the information. The space these positions utilize in Nova's database is minimal at best, so you will not feel a performance impact by removing this information.

If you are certain you will never use a position or department in the future, then it may be best to proceed with deleting that option entirely. Remember that these actions cannot be undone or recovered, so proceed with caution!
{% /callout %}
