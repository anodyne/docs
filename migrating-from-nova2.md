---
title: Migrating from Nova 2
description: Learn how to migrate your data from Nova 2 to Nova 3.
layout: docs
section: Getting Started
---

The first step in migrating from Nova 2 is to do a [fresh install](/docs/3.0/installation) of Nova 3. Please follow the install guide until you're prompted to either continue as a fresh install or migrate from Nova 2.

## Connect to your database (again)

Nova's migration process allows for your Nova 2 data being in the same database or an entirely different database. The first thing that needs to be done is to choose which option you want.

If your Nova 2 data lives in the same database, you won't need to do anything.

If your Nova 2 data lives in a different database, you'll be prompted to provide the credentials for the Nova 2 database in a similar fashion to how you provided your database credentials for doing a fresh install.

## What gets migrated from Nova 2?

|Data                                                   |Will be migrated|
|-------------------------------------------------------|----------------|
|Access roles                                           |No              |
|Application history                                    |Yes             |
|Awards (no longer a feature in Nova)                   |No              |
|Bans                                                   |Yes             |
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

## Some notes about removed features

Undoubtedly after reading the list above, there are concerns about features that have been removed from Nova completely. Keep reading for more information about each of those features.

### Awards

One of our goals with Nova 3 was to create a platform that was less focused on particular genres and more focused on the management of the game and writing. We felt that awards didn't necessarily fit into that vision, at least at launch.

In the long-term, we see there being some potential for writing a first-party add-on that will add this feature back in for those that want to use it, but there is no timeline for such an add-on.

### Chain of command

This feature was largely informational in previous versions of Nova. We opted to remove this entirely. If you're interested in duplicating this functionality, you can create a new public-facing page and write this content yourself.

### Comments

We had high hopes for comments in Nova, but it simply didn't pan out the way we hoped. Rather than try to revamp this, we opted to remove comments altogether.

### Docking

This was a feature that created some disconnect between Anodyne and users since it was purely informational, but felt like it should have been more. We opted to remove this entirely. In the future, we have ambitious plans to re-introduce something similar on a larger scale.

### Specifications and tour items

This is easily one of the largest omissions from Nova 2's feature set. One of our goals with Nova 3 was to create a platform that was less focused on particular genres and more focused on the management of the game and writing. We felt that specifications and tour items fell outside of that vision, at least at launch.

In the long-term, we see there being some potential for writing a first-party add-on that will add this feature back in for those that want to use it, but there is no timeline for such an add-on.

In the short-term, you can create public-facing pages and add this content yourself if you so choose.

### Wiki pages

Games either loved the wiki and used it extensively, or they hated it and didn't engage with it at all. Given the focus on giving game masters an easier way to create new pages, we felt that the wiki had served its time and could be put out to pasture. There is no mechanism in place to convert wiki pages to Nova's new pages and no plans to create anything to do that. If you want to retain that content, you'll need to re-create it as pages in Nova 3.
