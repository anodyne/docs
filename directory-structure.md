---
title: Directory structure
description: A quick look at each of Nova's directories and root files.
layout: docs
section: Core Concepts
---

## Root directory

- `application`: This folder contains all of the configuration and customization files that Nova uses. If you want to make changes to Nova, this is where you'll end up doing most of your work to avoid situations with your changes being wiped out during an update.
- `nova`: This is the heart and soul of Nova. Included in this directory is the CodeIgniter framework (which should never be edited or updated ... always let Anodyne test and release any changes to CI), the CodeIgniter and Nova licenses, and the Nova core itself.
- `index.php`: This is Nova's bootstrap file and starts up the framework and everything Nova needs.
- `message.php`: The message file is used by Nova to display informational messages to users in the event a major error has occurred. If a user's browser doesn't meet the requirements, the server doesn't meet the requirements, or a user has been issued a level 2 ban, this page will display the appropriate information to the user.

## Application directory

- `assets`: The assets folder mainly contains genre files and images. You'll also find any backups Nova does for you in this folder.
- `cache`: CodeIgniter comes with the ability to cache view files to help speed up the loading of pages. CI will store its cache files in this directory. (Because of the dynamic nature of Nova, there's little we can cache.)
- `config`: The config directory stores all of the application and framework's configuration files, including general configuration, database connections, auto-loading, constants and many others.
- `controllers`: Controllers are the heart of Nova and determine how HTTP requests should be handled. A Controller is simply a class file that is named in a way that can be associated with a URI. When a controller's name matches the first segment of a URI, it will be loaded.
- `core`: CodeIgniter core libraries are specialized base libraries that are part of the core framework and initialized every time.
- `errors`: The errors directory holds simple view files that are called in the event an error is encountered by CodeIgniter. Included in this directory is a 404 error page, a database error page, a PHP error page and a general error page.
- `extensions`: Extensions are one of Nova's newest features, enabling developers to package MODs into modular formats for the average user to deploy and utilize.
- `helpers`: Helpers, as the name suggests, help you with tasks. Each helper file is simply a collection of functions in a particular category. Unlike most other systems in CodeIgniter, helpers are not written in an Object Oriented format. They are simple, procedural functions. Each helper function performs one specific task, with no dependence on other functions.
- `hooks`: Nova takes advantage of CodeIgniter's hook system to "hook" in to various points during the execution process to check whether maintenance mode is turned on, if the user has a supported browser or to find out if the user has a level 2 ban. If you develop any hooks, this is where you'll store them.
- `language`: The language directory is where CodeIgniter will look for the language files needed to translate the system from English to whatever you language you want. In Nova 2, the language files are stored in the Nova module and a single language file pulls the necessary files in as well as giving admins the ability to override language items.
- `libraries`: Libraries are PHP classes designed with a specific set of actions in mind. CodeIgniter contains many of these and we've also built some of our own for Nova as well.
- `logs`: CodeIgniter has the ability to log all kinds of errors and information messages that can help in debugging. By default, Nova ships with the bare minimum being written to this directory, but if you need more information about what CodeIgniter is doing, you can turn up the error reporting and view the error logs here.
- `models`: Models are PHP classes designed to work with information in your database. They provide a quick and easy way to pull information that doesn't require admins to write lots of database queries. Even better, models in Nova use CodeIgniter's Active Record class meaning they're easy to build and understand.
- `modules`: Modules are a way to store related code that makes it easy to distribute. Module support is new in Nova 2 and requires a healthy understanding of how Nova and CodeIgniter work.
- `third_party`: New to CodeIgniter 2 are application packages which are a way to set extra directories that contain libraries, models, helpers, etc. Currently, Nova 2 does not use CI 2 packages.
- `views`: A view is simply a PHP page that contains the HTML markup that creates the presentation of the page you're viewing. Views are never called directly, they must be loaded by a controller. Typical contents of this folder include the site's various skins and customized pages.

## Nova directory

{% warning title="Exercise caution" %}
We've provided tools to prevent you from having to edit core files, but if a situation comes up where it's unavoidable, you should be **very** careful when modifying core files. Errant changes to these files can result in major problems and in some cases cause your site to stop working altogether!
{% /warning %}

- `ci`
    - `core`: This is the heart of CodeIgniter. Once the index file is executed, the last thing it does is to pull in the main CodeIgniter file from this directory.
    - `database`: CodeIgniter comes with some robust database drivers that allow it to connect to MySQL, MS SQL, PostgreSQL, SQLite, Oracle and ODBC databases. Nova itself only uses MySQL and MySQLi.
    - `fonts`: CodeIgniter stores a single font in this directory for use in the system. Nova makes no use of this directory.
    - `helpers`: Helpers, as the name suggests, help you with tasks. Each helper file is simply a collection of functions in a particular category. Unlike most other systems in CodeIgniter, helpers are not written in an Object Oriented format. They are simple, procedural functions. Each helper function performs one specific task, with no dependence on other functions.
    - `language`: The language directory is where CodeIgniter will look for the language files needed to translate the system from English to whatever you language you want. In order to use additional languages, you must have a corresponding language directory in both this directory as well as the application's language folder.
    - `libraries`: Libraries are PHP classes designed with a specific set of actions in mind. CodeIgniter contains many of these and we've also built some of our own for Nova as well.
- `licenses`: This folder contains the current licenses for Code Igniter and Nova.
- `modules`
    - `assets`
      - `database`: The database asset folder stores the default database config file that Nova's new setup process uses to write the database connection file. **Never edit this file. Doing so will break the setup config process.**
      - `install`: The install folder contains all of the assets needed to install the system. These assets are also used during the SMS upgrade process as well as during some of the database changes processes.
      - `js`: Nova makes extensive use of jQuery and a wide array of plugins. The js folder holds all those Javascript pieces that are used by the system.
      - `update`: The update folder contains all of the assets needed to update the system.
    - `core`
      - `config`: While all of Nova's config files are in the application directory, there are often times where some of those files need to be edited on a regular basis. Because of that, "base" config files are in the Nova config directory so the initial values can be set and then overridden by the application version.
      - `controllers`: If you need to override a base controller, you'll need to copy the method(s) from these files.
      - `core`: CodeIgniter core libraries are specialized base libraries that are part of the core framework and initialized every time.
      - `helpers`: These are the base files that are then extended in the application directory. If you need to override a helper, you'll want to copy it from these base files to the `application/helpers` directory.
      - `hooks`: The hooks used in Nova are defined in this directory. If you need to modify an existing hook, copy it from here to `application/hooks` directory and edit it from there.
      - `language`: Save for one file, all the language files are stored here.
      - `libraries`: The base libraries used by Nova are stored here. If you need to modify an existing library, copy it (or the method(s) you need) to the application's libraries folder and edit from there.
      - `models`: The base models used by Nova are stored here. If you need to modify an existing model, copy it (or the method(s) you need) to the `application/models` directory and edit from there.
      - `views`: The base views used by Nova are stored here. If you need to modify an existing view, copy it to the specific skin you want it to apply to or the `application/view/_base_override` folder and edit from there.
- `swiftmailer`: This folder contains additional operational files for Nova's default email system.
