---
title: Migrating from Nova 2
description: Learn how to migrate your data from Nova 2 to Nova 3.
layout: docs
section: Getting Started
---

The first step in migrating from Nova 2 is to do a [fresh install](/docs/3.0/installation) of Nova 3. Please follow the install guide until you're prompted to either continue as a fresh install or migrate from Nova 2.

## Connect to your database (again)

Nova's migration process allows for your Nova 2 data being in the same database or an entirely different database. The first thing that needs to be done is to choose which option you want.

If your Nova 2 data lives in the same database, you may not need to do anything. You'll be presented with the database connection configuration screen again and asked to verify that the details are correct. (In particular, ensure that the database table prefix is correct for your setup.)

If your Nova 2 data lives in a different database, you'll be prompted to provide the credentials for the Nova 2 database in a similar fashion to how you provided your database credentials for doing a fresh install.

## Migrate your data

Nova will systematically copy data from your existing database tables to the new database tables that Nova 3 will use. Generally this is a pretty fast process, but depending on the amount of data you have, it could take a couple of minutes. We've done our best to provide realtime feedback as the process runs so that you know when something is running and if it was successful or not.

An important, albeit technical, thing to understand about the migration process is that the migration scripts are **idempotent**. That means that running the same operation multiple times won't change the final result. This design ideally ensures that data isn't accidentally duplicated and allows things to be re-run if needed. If there are any errors during the migration, you can re-run the process without it duplicating data unnecessarily. (There are of course caveats to this, but generally the principle holds.)

### What gets migrated from Nova 2?

|Data                                                   |Will be migrated|
|-------------------------------------------------------|----------------|
|Access roles                                           |No              |
|Application history                                    |Yes             |
|Awards (no longer a feature in Nova)                   |No              |
|Bans                                                   |No              |
|Chain of command (no longer a feature in Nova)         |No              |
|Character form                                         |Yes             |
|Characters                                             |Yes             |
|Comments (no longer a feature in Nova)                 |No              |
|Departments and positions                              |Yes             |
|Docking (no longer a feature in Nova)                  |No              |
|Manifests                                              |No              |
|Menu items                                             |No              |
|Mission groups (now part of stories in Nova 3)         |Yes             |
|Missions (called stories in Nova 3)                    |Yes             |
|News items (called announcements in Nova 3)            |Yes             |
|Personal logs                                          |Yes             |
|Posts                                                  |Yes             |
|Private messages                                       |Yes             |
|Ranks                                                  |No              |
|Settings                                               |No              |
|Specifications and tour (no longer a feature in Nova 3)|No              |
|Skins (called themes in Nova 3)                        |No              |
|Users                                                  |Yes             |
|Wiki pages (no longer a feature in Nova 3)             |No              |

#### Access roles

Access roles are not migrated. Nova 3 introduces a more robust, more flexible authorization system. We encourage users to review the roles and permissions available and make changes to it for how they want to manage their game.

#### Application history

Application history is migrated to Nova's new format with the following exceptions:

- The user associated with the application has been deleted prior to migration
- The character associated with the application has been deleted prior to migration
- The action taken on the application is not `accepted`, `rejected`, or `pending`

##### Notes

- Nova 2's applications do not store when a decision was made on the application, but Nova 3. To address this discrepancy, decision date is set to the created date. If you have records that indicate when the decision is made and you want to update the database to have this infromation, you will need to manually update the `applications` database table.

#### Forms

The character form is migrated to Nova's new format, this includes fields and all data associated with a field for a character.

When it comes to forms, it's important to note that Nova 3's forms do not include tabs as an organization tool. (Technically speaking, it also doesn't include sections either, but we do allow for freeform text in a form that can be used as pseudo-sections.) This means that your character form will be a single long series of fields after the migration is complete.

Our recommendation is to not migrate the character form and build something that works best for your game before having your users update their characters with the new form format.

#### Characters

All characters will be migrated with the following exceptions:

- Character promotion history is not migrated to Nova 3

Nova 3 does not make a distinction between playable characters and non-playable characters like Nova 2 does. Characters are characters and they're all available in the same place in Nova 3.

#### Departments and positions

All departments will be migrated, however, there is no support in Nova 3 for nested departments. Any department that has a parent department will simply be added to the normal list of departments and you will need to update the order accordingly. We do intend to bring nested department support to Nova 3 at a future date.

All positions will be migrated, except in a situation where the department they belong to no longer exists. If that happens, the positions will not be migrated. This could create a situation where a character is no longer assigned a position. After migrating your Nova 2 data, carefully review your characters to ensure positions are correct.

#### Mission groups and missions

All mission groups and missions will be migrated.

Missions have been renamed to stories in Nova 3. All missions will be migrated to stories. Unlike Nova 2 where mission groups were a separate entity, in Nova 3, stories can contain other stories. As a result of this change, all mission groups will be migrated to be stories. As Nova processes the mission group and mission migrations, you may notice that the indicator badge may show a higher number of stories have been migrated than there are mission groups. This is normal and nothing has been duplicated too many times.

#### News items

News items have been renamed to announcements in Nova 3. All news items will be migrated to announcements, except in a situation where the user associated with the news item has been deleted. If that happens, the news item will not be migrated.

#### Personal logs

Personal logs are no longer a standalone entity in Nova 3 and are part of the story system. As part of the migration process, Nova will create a story called "Personal log migration" that will store all personal logs. We recommend going through the personal logs in this story and moving them to the appropriate story.

If you have users and/or characters who have been deleted, it's possible you may have personal logs in your system that do not have an author associated with them. Nova will handle this without issue, but you may want to either delete those entries manually or create a support character to assign as the author.

#### Posts

All posts are migrated to Nova 3's new format.

#### Private messages

Private messages can be migrated to Nova 3, but we don't recommend it. Nova 2 does not have a mechanism for group related messages together. That means that you will end up with a large list of private messages that are not grouped logically and don't have a means of grouping them. Unless absolutely necessary, we recommend skipping the private messages migration script.

#### Ranks

Due to Nova 3's new rank format, your existing ranks will not be migrated.

#### Settings

The following setting values will be moved to Nova 3's settings:

- Email subject prefix
- Email default from name
- Email default from address
- If the contact form is enabled

#### Skins

Nova 2 skins are not compatible with Nova 3's themes and will not be migrated.

#### Users

All users will be migrated to Nova 3.

Nova has eliminated some of the fields that were present on the old users database table. To preserve that data, Nova will create a user form and move those fields to the user form. After the migration is complete, you will be able to edit the user form to include whatever information you want, including removing fields you don't use.

### Some notes about removed features

Undoubtedly after reading the list above, there are concerns about features that have been removed from Nova completely. Keep reading for more information about each of those features.

#### Awards

One of our goals with Nova 3 was to create a platform that was less focused on particular genres and more focused on the management of the game and writing. We felt that awards didn't necessarily fit into that vision, at least at launch.

In the long-term, we see there being some potential for writing a first-party add-on that will add this feature back in for those that want to use it, but there is no timeline for such an add-on.

#### Chain of command

This feature was largely informational in previous versions of Nova. We opted to remove this entirely. If you're interested in duplicating this functionality, you can create a new public-facing page and write this content yourself.

#### Comments

We had high hopes for comments in Nova, but it simply didn't pan out the way we hoped. Rather than try to revamp this, we opted to remove comments altogether.

#### Docking

This was a feature that created some disconnect between Anodyne and users since it was purely informational, but felt like it should have been more. We opted to remove this entirely. In the future, we have ambitious plans to re-introduce something similar on a larger scale.

#### Specifications and tour items

This is easily one of the largest omissions from Nova 2's feature set. One of our goals with Nova 3 was to create a platform that was less focused on particular genres and more focused on the management of the game and writing. We felt that specifications and tour items fell outside of that vision, at least at launch.

In the long-term, we see there being some potential for writing a first-party add-on that will add this feature back in for those that want to use it, but there is no timeline for such an add-on.

In the short-term, you can create public-facing pages and add this content yourself if you so choose.

#### Wiki pages

Games either loved the wiki and used it extensively, or they hated it and didn't engage with it at all. Given the focus on giving game masters an easier way to create new pages, we felt that the wiki had served its time and could be put out to pasture. There is no mechanism in place to convert wiki pages to Nova's new pages and no plans to create anything to do that. If you want to retain that content, you'll need to re-create it as pages in Nova 3.

### Asynchronous migration

The migration process to Nova 3 is a synchronous process (meaning it runs inside the web browser when you request for it to be run). This is generally fine, but for games with a large amount of data, it may not be possible for everything to run before the server or the browser shut down the request (in some cases, this can be 30 or 60 seconds per migration that needs to run, but that can vary by server).

We've built the migration process to also allow for migrations to be run asynchronously (run on the server and not within the browser). This requires certain server requirements and some additional setup, but if your host allows for it, it can be a good way to handle migrating large amounts of data without worrying about anything timing out or needing to be run several times to capture all of the data.

In order to use asynchronous migrations, you will need to ensure that Laravel's queue driver is set to something other than `sync`. In general, this would likely something like Redis or even using the database as a queue driver. You'll also need to have a worker process running on your server that will be able to work through the jobs being put onto the queue for asynchronous processing.

We've built the migration UI to handle both scenarios and if you use asynchronous migrations, we'll provide more immediate real-time feedback about the progress of how your migrations are running (by default, we poll for a status update every 3.5 seconds).

## Select system administrator

After your data has been successfully migrated, you will be prompted to select a user as the System Administrator. For the migration process, Nova will set the proper access roles for the user you select. This allows you to sign in and take all of the necessary administrative actions, including adding more administrators if you so choose.

You will also be prompted to update the password of the selected user account. This will allow you to sign in to Nova immediately rather than needing to reset your password. (This can potentially be problematic since email may not be properly configured at this point.)

## Notes

- There are several places where Nova is reporting on statistics that are based on word counts. Nova 2 has word counts for posts, but does not have word counts for individual contributors to a post. As such, many of those statistics will show 0 words after completing a migration. There is no way for us to build a historical record of individual contributors, so you may want to choose to change those statistics to be post-based instead.
