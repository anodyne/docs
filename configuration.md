# Configuration

Learn how to configure Nova 2 from the simple to the advanced.

---

## Nova

### Genre

One of the most important configuration variables, the **genre** option will tell Nova what position, department, and rank data to use when installing the system as well as when accessing the database. If this is blank, the system will not install! If you want to change your genre after you've installed Nova, you'll need to change this variable to the three letter genre code for the genre you're going to. To change this, please see [Genres](/genres.md) under Core Concepts.

### Meta Data
Nova comes with some default meta data, but admins can change the data to their preference through variables in the `application/config/nova.php` file. By default, Nova ships with the following meta data:

- **Description** - Anodyne Productions' premier online RPG management software
- **Author** - Anodyne Productions
- **Keywords** - nova, rpg management, anodyne, rpg, sms

### RSS Settings
Nova allows people (crew and otherwise) to subscribe to RSS feeds with mission posts, personal logs, and news items. With the rise of Discord, many are opting to add bots capable of pulling from these RSS feeds into their Discord servers. There are several options for configuring these feeds in `application/config/nova.php`.

### Thresher Settings
Nova's integrated mini wiki, Thresher, has a single config file that allows admins to change the way content is stored and parsed. By default, Thresher will store and parse wiki page content as HTML, but you can also use BBCode, Markdown and Textile for storing and parsing. You can change the parse type in the Thresher config file found at `application/config/thresher.php`.

:::note
Once you have selected a parse type, you shouldn't change it. If you change the parse type, your wiki pages may not display properly.
:::

## CodeIgniter
