---
title: Manifests
description: Learn more about Nova's powerful manifest structure, including how it interacts with departments and positions.
layout: docs
section: Guides
---

Young or old, every game will feature a wide variety of characters. Each character brings a unique flavor and skill-set to that environment. Nova's manifest structure provides a way to list those characters in an easy-to-organize manner to allow for any player to locate information about any of the characters used in the game.

Manifests are organized around three different elements:

- *Manifests*: the container for a collection of characters of a certain type.
- *Departments*: a group of characters that are united for a similar purpose.
- *Positions:* the heart and soul of Nova's character system which immediately identifies the function of each character.

## Permissions

To edit any manifest, department, and position in Nova, you must have at least the *System Administration* access role, or your access role needs to have the appropriate setting management (such as *Site Manifests*, *Manage Departments*, *Manage Positions* etc.) feature(s) enabled. Typically, this feature is reserved for those who are managing the game.

## Manifests

Site manifests are a way of organizing your departments/positions and characters around specific attributes that can be as broad or narrow as you want. By default, Nova comes with a single manifest created and enabled, but you can easily create additional manifests to organize however you see fit. For example, in *Star Trek* games, a starbase may have manifests for attached starships, such as *Deep Space Nine* would have the *USS Defiant*.

Manifests are viewable by anyone visiting your site. When a manifest is viewed, the user will only see the characters that are attached to each manifest's assigned departments and positions.

### Creating and editing

To manage the available manifests in Nova, you can navigate to the *Site Manifests* page located under the Site Management subheading in the sidebar.

To create a manifest, click the *Add Manifest* option.

{% screenshot src="/images/docs/2.7/using-manifests/manifest-add.png" alt="add a manifest" /%}

To edit an existing manifest, click on the edit icon. To delete a manifest, click on the delete icon.

{% screenshot src="/images/docs/2.7/using-manifests/manifest-edit-delete.png" alt="edit or delete a manifest" /%}

When creating or editing a manifest, the following options are available to you:

- *Name*: the name of the manifest.
- *Order*: the order in which the manifest will be displayed within the list of available manifests. Enter a number ranging from `0` (top of the list) to `99` (bottom of the list).
- *Display*: determines if you want this manifest to appear on the Personnel page.
- *Default Manifest*: if selected, this manifest will be the default manifest shown when viewing the Personnel page, no matter what position it has within the order.
- *Description*: a short description of the manifest for users.
- *Header Content*: any specific text you would like displayed at the top of the manifest before displaying any characters.
- *Default View*: this will determine what will be visible to any user viewing the Personnel page. The available options are:
  - *Active Characters only*: displays only primary characters assigned to active users.
  - *NPCs only*: displays only secondary characters, both attached and unattached.
  - *Open Positions only*: will only display positions which the management team is hoping to fill within the game.
  - *Inactive Characters only*: displays only primary characters for user accounts that have been placed into inactive status.
  - *Active Characters & NPCs*: displays both primary characters assigned to active users, and any secondary characters assigned to positions within the selected manifest.
  - *Active Characters, NPCs, and Open Positions*: displays all characters and open positions within the selected manifest.
  - *NPCs and Open Positions*: displays both secondary characters and positions without a character assigned within the selected manifest.
- *Manifest Metadata*: you can specify additional information to be displayed on the manifest by entering the field's HTML name (found under HTML Attributes when editing a bio form field) and separating fields with a pipe (|). Information will be displayed in the order specified (i.e. species|gender).

If a manifest has metadata enabled, such as species and gender, the metadata will appear under the character names listed in the manifest.

{% screenshot src="/images/docs/2.7/using-manifests/metadata.png" alt="manifest metadata" /%}

## Departments

Departments act as dividers within a manifest, organizing a particular group of characters. Typical departments within a *Star Trek* game would be Command, Security, or Science. A game set in the *Battlestar Galatica* universe would have departments for the Viper and Raptor Wings, as well as the Hangar Deck Staff.

{% note %}
In order to display properly, each manifest must have at least one department enabled.
{% /note %}

### Creating and editing

To manage the available departments in Nova, you can navigate to the *Departments* page located under the Management subheading in the sidebar.

From the department management page you'll be able to see all departments for your game. These departments are organized by whether or not they are assigned to a manifest. Within the Assigned tab, you can see all departments organized by which manifest they are assigned to.

{% screenshot src="/images/docs/2.7/using-manifests/departments.png" alt="the departments management page" /%}

To add a department, click *Add Department*.

{% screenshot src="/images/docs/2.7/using-manifests/departments-add.png" alt="add a department" /%}

To edit a department, click on the edit icon. To delete a department, click on the delete icon. If you would like to copy a department and its positions for use in another manifest, you can click on the duplicate icon.

{% screenshot src="/images/docs/2.7/using-manifests/departments-edit-delete-duplicate.png" alt="add, delete, or duplicate a department" /%}

{% warning %}
Deleting and updating departments could negatively affect other departments, positions, and characters. Proceed with caution.
{% /warning %}

{% tip %}
Once you've duplicated a department, you should change the description to make it clear which manifest it's associated with.
{% /tip %}

When creating or editing a department, the following options are available to you:

- *Name*: the name of the department.
- *Order*: the order in which the department will appear. Enter a number ranging from `0` (top of the list) to `99` (bottom of the list).
- *Type*: determine whether or not the positions or purpose for this department is for playing (primary) characters or non-playing (secondary) characters.
- *Parent Department*: select if this department requires a parent department (such as Counseling under the Medical Department) or if it this department can stand on its own within a manifest.
- *Manifest*: the manifest you want this department assigned to.
- *Display*: determine if you want this department to appear. Be aware, if a department is set to not display, then any position attributed to this department will not appear on the Personnel page or in any dropdowns throughout the site.
- *Description*: enter a description of what the department's purpose is.

When you have finished entering your information, click on the **Submit** button.

### Assigning departments

Departments must be assigned to a manifest in order for them to be displayed on the Personnel page or for their positions to appear as options in the join form. Departments can be assigned to a manifest either by directly editing the department or by using the assign department page from the Site Manifests management page.

{% screenshot src="/images/docs/2.7/using-manifests/manifest-assign-departments-link.png" alt="assign departments to a manifest" /%}

From here you can assign departments to a specific manifest. To do so, drag the department to the desired manifest. All changes will be immediately saved so there will be no need to update. The user interface, however, will not automatically clean itself up, or properly arrange the departments within a manifest. To clean up the presentation of the page, click on the *Refresh Page* at any time.

{% screenshot src="/images/docs/2.7/using-manifests/manifest-assign-departments.png" alt="assign departments to a manifest" /%}

## Positions

Positions are the heart and soul of Nova's character system. Not only does a position define a character's primary function within the story, these positions are integral to how manifests themselves are presented to users. Positions are also required for any character to exist within Nova and any character application must also be tied to an available position.

### Creating and editing

To manage the available positions in Nova, you can navigate to the *Positions* page located under the Management subheading in the sidebar.

{% screenshot src="/images/docs/2.7/using-manifests/positions.png" alt="the positions management page" /%}

{% warning %}
Deleting and updating positions could negatively affect characters. Proceed with caution.
{% /warning %}

Whereas manifests and departments provide the structural containers for character organization, positions are the true building blocks of Nova's character system. Nova immediately displays for you the most used elements: the *name* and *open slots*. If additional editing is required, you can click on the **More** button to see the remainder of the editable options. Once all updates within a department are complete, scroll to the bottom of the positions list and click **Update**.

Positions are organized in this management section via departments. All departments, regardless of their display status, are accessible through this page, allowing you to freely enter and edit positions.

To add a position, click the *Add Position* button.

{% screenshot src="/images/docs/2.7/using-manifests/positions-add.png" alt="add a position" /%}

To edit a position, navigate to the department the position is assigned to and scroll to the position you wish to edit. You can always edit the name, whether it's a top open position, and the open slots. If you want to edit additional information, click on the More button to open a pop-up with other fields. Once you've updated the information, click the **Submit** button, and then click the **Update** button at the bottom of the position listings to apply the updates and refresh the positions listings.

{% screenshot src="/images/docs/2.7/using-manifests/positions-edit-more.png" alt="edit a position" /%}

To delete a position, click on the *Delete?* checkbox of the position you'd like to delete. Once you have selected all positions within a department you want to delete, click the **Update** button.

{% screenshot src="/images/docs/2.7/using-manifests/positions-delete.png" alt="delete a position" /%}

{% tip %}
For best results, you will want to make your changes one department at a time. If you navigate between departments without submitting your changes, Nova will not save your work.
{% /tip %}

When creating or editing a position, the following options are available to you:

- *Name*: the name or title of the position.
- *Deparment*: the department the position should be assigned to.
- *Type*: select between *Senior*, *Officer*, *Enlisted*, or *Other* to determine which class the position falls under.
- *Open Slots*: determine how many characters can be assigned to this position, up to a maximum of 50. Nova will track the number of active characters assigned to this position, and, once the maximum number is reached, will remove the position as a selectable option for new characters.
- *Top Open Position*: whether the position should be shown in the Top Open Positions section of the manifest when the Open Positions option is selected.
- *Order*: the position that the current position will hold within the department listing. Enter a number ranging from `0` (top of the list) to `99` (bottom of the list).
- *Display*: determine if you want this position to appear for you or your players on the Personnel or Join pages. Be aware, if a position is set to not display, then any character attributed to this department will not appear on the Personnel page.
- *Description*: enter a description of what the positions's purpose is or a job description to help your players understand how the position is to be used in the game.

{% note title="Disable or delete?" %}
Many games change over time, as do the available positions. If you think there's a possibility you may use a department or position in the future, your best option may be to set the Display option to off. This way, you can re-enable it later to make the position(s) available to your players and retain the information.

If you are certain you will never use a position in the future, then it may be best to proceed with deleting that option entirely. Remember that these actions cannot be undone or recovered, so proceed with caution!
{% /note %}
