---
title: Migrating from Nova 2
description: Learn how to migrate your data from Nova 2 to Nova 3.
layout: docs
section: Getting Started
---

The first step in migrating from Nova 2 is to do a [fresh install](/docs/3.0/installation) of Nova 3. Please follow the install guide until you're prompted to either continue as a fresh install or migrate from Nova 2.

## Connect to the database

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
