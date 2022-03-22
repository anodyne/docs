# Genres

Learn more about genres, the foundational element of Nova's character management system.

---

One of Nova's defining features is the ability to craft any game according to any genre, including ones that we don't naturally provide installer packages for. So what goes in to a genre? There are a lot of pieces, but once you understand those pieces, you'll be well on your way to using genres to their full potential and maybe even creating your own genre installations!

## What genre is my site is using?

There are several ways to see what genre your site is installed with:

- Open the `application/config/nova.php` file to find the genre code listed near the top of the file
- Look in `application/assets/common` to see the name of the folder that will correspond with your genre
- Open your database and look at the departments, ranks, or positions tables to find the genre code as a suffix of the database table name

## Genre code

Genre codes can only have 3 characters. For example, the Deep Space Nine genre code is `ds9`. We recommend that all genre codes contain only lowercase characters and numbers for maximum compatibility throughout Nova.

## Can I have more than one genre installed?

While the database structure can allow for a nearly infinite number of genres to be installed, only one genre can be active at a time on a Nova instance. To change the active genre, you will need to locate `nova.php` in the `application/config` directory. On Line 15, change the existing 3-letter genre code to the desired code. For instance, if you wish to switch from *Deep Space Nine* to *The Original Series*, you would change from `ds9` to `tos`.

:::warning
Nova 2.7 removes the ability to install additional genres into an existing site. If you want to change the genres of your site, you will need to backup your database, do a fresh install, and manually migrate your data into the new database.
:::

## Files

There are multiple locations for the files associated with each genre, including Asset Files, Images, and Ranks.

### Asset files

Asset files are the integral components of a genre and include images and ranks. Nova stores all genre assets in `application/assets/common`. Each genre is assigned its own directory that lines up with its genre code.

#### Images

If you have genre specific images, such as the emblems for the manifest (known by those in the Star Trek genre as *combadges*), those can be stored in the genre's images folder and used by Nova in various places throughout the system.

For example, if you wanted to replace the default combadge image for a character that is on a leave of abence (or LOA) for a DS9 genre game, you would place your custom `combadge_loa.png` image in `application/assets/common/ds9/images`.

Exact bio emblem locations can be found by using the `cb` helper located in the `Nova_location.php` file found in `nova/modules/core/libraries` directory.

#### Ranks

Ranks are arguably one of the biggest asset pieces that change from genre to genre. Yes, the database changes, but the most noticeable area, especially to the public eye, are rank images. The ranks folder in the genre directory is where all the different rank sets are stored and accessed from. Multiple rank sets can be installed at a time, and one can easily switch between them, provided that they are contained within their own folder. If you want to add a rank set, you must upload it to `application/assets/common/{genre}/ranks`.

### Database

All the genre-specific elements are contained in three tables in the database: **departments**, **positions** and **ranks**. This allows multiple genres to be installed side-by-side in the database. Any genre you install into the database will have suffixed tables with the genre code. For example, the three tables used by the DS9 genre are named `nova_departments_ds9`, `nova_positions_ds9` and `nova_ranks_ds9`.

### The install file

Nova stores the genre install files in `nova/modules/assets/install/genres`. There is one file for each genre that's stored in the format `{genre}_data.php`. Essentially, genre files are nothing more than several large PHP arrays with all the information about departments, positions and ranks. That data is fed into the install script and uses the arrays along with CodeIgniter's Database Forge feature to create tables and insert data into them.

## Creating a genre install

If you're interested in creating a genre file, we recommend that you duplicate one of the existing genre data files and start from there. In order to create a genre file, you have to have departments, positions and ranks. If one of those components is missing, parts of the system will break without major modifications.

:::note
It's important that you understand PHP handling of single and double quotes and escaping quotes as necessary, otherwise you'll run in to a long series of errors that will be maddening trying to fix. In a nutshell, if you have a string surrounded by single quotes, you can only use another single quote in that string after escaping with the backslash (`\`). Here's how you would handle a few different types of strings:
:::

```php
'This is a string that does not need escaping.'

'This is a string that does need to be escaped by it\'s got an extra single quote in it.'

"Alternately, you could switch to use double quotes so you don't have to escape any single quotes."
```
