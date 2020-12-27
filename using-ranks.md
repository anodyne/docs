# Ranks

Learn about Nova's rank system and how to customize them.

---

## What are ranks?

Many online RPGs attach a rank to characters to denote a certain status/hierarchy in-character. For example, a character in *Star Trek* could be a Lieutenant while a character in *Star Wars* might be a Jedi Knight and a character in *Firefly* could be a Civilian.

Nova is designed to handle both complex and simple rank structures. To understand how best to use this structure, it helps to understand the terms Nova uses for organzing ranks:

- A **rank** is the name of a particular level in a rank hierarchy. For example, Captain, Ensign, Colonel, Glinn, Procounsel, Civilian, etc.
- A **rank class** is a collection of ranks, usually used to organize ranks by a department and/or division. For example, in Star Trek the Command Department uses red backgrounds and all ranks that use that color background will have the same rank class.
- A **rank set** is a complete collection of stylized rank images. Most Nova installers come with a full set of these images customized for that genre, such as *DS9*, *TOS Movie Era*, *seaQuest*, etc. Additional rank sets are available at [AnodyneXtras](https://xtras.anodyne-productions.com) or [Kuro-RPG](http://kuro-rpg.net/).

## Permissions

To view and edit Ranks, rank classes, and rank sets, you must have at least the *Basic Administration* access role, or your access role needs to have the *Manage Ranks* feature enabled. Typically, this feature is reserved for those who are managing the game.

Additionally, to add rank sets you will need to have direct access to your site's files either through an FTP client or through cPanel/Plesk's File Manager.

## Viewing ranks

From the Rank Management page, you will be able to view all ranks. In Nova's Control Panel, locate **Ranks** under the *Management* subheader in the sidebar.

![Ranks Management](/images/docs/2.6/using-ranks/management-ranks.png)

All available rank sets and rank classes will be displayed at the top of the page. Individual rank sets will be denoted by a single preview image and rank classes within a rank set will be displayed by a preview image of each color. You can click on the desired class image to display all ranks in that rank class.

![Rank Sets and Classes](/images/docs/2.6/using-ranks/ranks-sets-classes.png)

## Adding a rank

Let's walk through the process of creating a new rank.

Adding a rank is simple. Let's create a Lieutenant in a *Star Trek* Science Division. In Nova's Control Panel, locate **Ranks** under the *Management* subheader on the sidebar.

1. From the Control Panel, locate **Ranks** under the *Management* subheader in the sidebar.
2. Click **Add A Rank**. A dialog box (also called a modal) will appear.
    ![Add Rank](/images/docs/2.6/using-ranks/rank-addrank.png)
3. Fill out the information in the dialog box:
  - *Name*: the name of the rank (e.g. *Lieutenant*).
  - *Short Name*: an abbreviation of the rank (e.g. *LT*).
  - *Order*: the position that the new rank will hold within the specific rank class. Enter a number ranging from `0` (top of the list) to `99` (bottom of the list).
  - *Rank Class*: the particular image class this rank will belong to.
      - If you are adding this rank to existing rank class, the easiest way to determine the rank class is to navigate to that particular rank class in Rank Management and see what value is being used in the rank class field and use that same value.
      - You can also create a completely new grouping of ranks by using a number that isn't used for any othe rank class. If you do this, it's important to note that without an *order* of `0`, a link to that newly created rank class will not appear in the navigation at the top of the page.
  - *Display*: determine if you want this rank to be a selectable option for you or your players.
  - *Image*: the filename of the rank image (not its location). Nova will automatically look for the image within a specified rank set based on whatever the site/user's active rankset is. **Do not include the file extension** as the system will only look for the extension assigned to the rankset in the Rank Catalouge.
4. Click **Submit** and the rank will be added to the system.

## Modifying a rank

To modify any existing rank that is available in Nova, access Nova's Control Panel, and locate **Ranks** under the *Management* subheader on the sidebar.

![Modifying a rank](/images/docs/2.6/using-ranks/rank-modify.png)

Select the appropriate **rank class**, and then scroll until you find the Rank you wish to edit. The Rank name and image are readily available, and more options are accessible via the `More` button. You can edit as many ranks as you need in the selected Class at a time, but you will lose your changes if you select a different Class. Be sure to hit the **Update** button at the bottom of the page before navigating to a new class.

## Remove a Rank's name and/or abbreviation

If you are operating a game that does not wish to use ranks, or would have rank-less characters mixed in with characters with ranks, you may want to have a blank rank for that character.

To remove a Rank's name and/or abbreviation, follow the instructions above for Modifying existing Ranks. When you select the Rank you wish to edit, simply erase the name and/or the abbreviation, then select **Update** at the bottom of the page.

![Blank rank](/images/docs/2.6/using-ranks/rank-blankrank.jpg)

## Removing a rank and/or rank class

Most *Star Trek* Nova installs provide up to 13 different rank classes for use in the game. These Classes are also automatically visible, making them available for use by Players creating NPCs, or Game Management assigning ranks to new characters.

If you would like to disable one or more Ranks or Classes, access Nova's Control Panel, and locate **Ranks** under the *Management* subheader on the sidebar.

1. Select the Class for the Rank(s) you wish to remove, and then locate the desired Rank(s).
2. Select the **More** button to reveal the advanced options.
3. Change `Display` from *Yes* to **No**.
4. Scroll to the bottom of the page and click **Update**.

The rank has now been removed as a selectable option for you and your Players, but can still be restored any time in the future.

To remove an entire rank class, follow the same steps as above for every Rank listed in that Class. You will be able to edit only one Class at a time.

To delete a rank, click on the *Delete?* checkbox, then scroll to the bottom and click **Update**.

## Adding a rank set

All fresh Nova installations (except for the *Blank Installer*), come with only one rank set. New rank sets are available at Anodyne Xtras or [Kuro-RPG](http://kuro-rpg.net/).

Once you have downloaded (or created) your new rank set, you will need to access your Site via FTP software, or your webhost's cPanel (or equivalent) software. Please refer to the instructions you received from your webhost when first creating your account with them.

### Uploading the rank set

Access your Site's files, and navigate to the `application\assets\common\xyz\ranks` directory. The **XYZ** directory will have a different name for your Site, such as `ds9`, `tos`, `blk`, etc. This directory identifies which installer was used to first build your Site.

You will notice that the `ranks` directory will already contain a `default` directory. That directory contains the pre-installed images for the base rank set.

Upload your new rank set to the `ranks` directory. If you are uploading a ZIP file, please be sure to extract the contents after the upload is complete.

Open the new directory and ensure that you see image files, and not additional directories. If your rank images are not immediately visible, then your Nova software will not be able to see them either.

### Installing the rank set

To install your new rank set, access Nova's Control Panel, and locate **Rank Catalogue** under the *Site Management* subheader on the sidebar.

![Accessing Rank Catalogue](/images/docs/2.6/using-ranks/controlpanel-installcatalogue.png)

Some downloadable rank sets contain a `rank.yml` file. Nova will automatically detect this file and will provide a button at the top of the **Rank Catalogue** page to easily install the rank set.

![Install Rankset](/images/docs/2.6/using-ranks/rankcatalogue-install.png)

If the rank set does contain the `rank.yml` file, but Nova does not detect it, please check your File Manager to ensure that the rank set was uploaded to the right location and that the files are visible.

If your rank set does not contain a `rank.yml` file, and is uploaded to the correct location, you will have to manually install your rank set. You can do this by clicking the **Add rank set** option at the top of the Rank Catalogue page.

The available options are:

1. *Name*: the name of your rank set.
2. *Genre*: the genre your set belongs to. For best results, this needs to match the genre which you used to install the Nova Software.
3. *Server Directory*: the name of the directory containing the rank set. **Do not include** the full `application\assets\common\xyz\ranks` directory again, just the name of the new directory.
4. *Preview Image*: the filename of an image that can be used to preview the entire set.
5. *Blank Image*: the filename of an image background that is representative of the set.
6. *Image Extension*: the file extension of all rank images in the directory, such as `.png` or `.jpg`.
7. *Status*: the stage in which the rankset exists.
8. *Credits*: any artistic or intellectual property credits associated with the rank.
9. *Default rank set*: Select whether or not you would like this rank set to be active for New Players.

When you are finished, click **Submit**. The rank set is now installed. To see the images belonging to your new rank set, locate **Ranks** under the *Management* subheader on the Nova Control Panel sidebar.

### Changing rank sets

Once you have more than one rank set installed, you can freely change between them at any time.

To change the rank set that appears for all users, specifically for those who are logged out, access Nova's Control Panel, and locate **Settings** under the *Site Management* subheader on the sidebar.

![Site Settings](/images/docs/2.6/using-ranks/sitemanagement-settings.png)

Select the **Appearance** tab, and locate rank set under Display Options. Once you have selected your rank set, scroll down and select the **Submit** button.

![Display Options](/images/docs/2.6/using-ranks/sitesettings-displayoptions.png)

Now that the rank set has been changed for most users, you will need to change your own account's display preferences in order to see the new set.

1. At the top of the page, find the **Dashboard** icon.
    ![Dashboard](/images/docs/2.6/using-ranks/dashboard.png)
2. A popup (modal) will appear in the center of the screen. Select **Edit Site Preferences**.
    ![Dashboard Modal](/images/docs/2.6/using-ranks/dashboard-sitepreferences.png)
3. Select the **My Ranks** tab.
    ![Select Your Rank](/images/docs/2.6/using-ranks/siteoptions-myranks.png)
4. Select your desired rankset, then click **Update**.

You will now be able to see your preferred rankset no matter where you are on the site!
