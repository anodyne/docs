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

|Data|Migration status|
|-|-|-|
|Applications|Yes|
|Awards|No|
|Characters|Yes|
|Departments and positions|Yes|
|Missions (called stories in Nova 3)|Yes|
|News items|No|
|Personal logs|Yes|
|Posts|Yes|
|Ranks|No|
|Users|Yes|
|Wiki entries|No|
