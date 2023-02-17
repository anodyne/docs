---
title: Versioning
description: Learn what Nova's version numbers mean for your site.
layout: docs
section: Resources
---

Nova releases are guided by a principle known as [semantic versioning](http://semver.org). The goal of semantic versioning is to ensure that users know what to expect when a new version of software is released based solely on the version number itself.

There are 3 components to a version number:

![Version numbers](/images/docs/2.6/versioning/version-number.png)

## Major version

A major version is only released when there have been major architectural or API changes made that could break backwards compatibility.

As with all our updates, we aim to include scripts to migrate data to the new version, but with major releases, some data may not be able to be migrated due to the nature of the changes a major version would introduce.

{% note title="You should know!" %}
The next major version of Nova will be Nova 3.0 as it includes an architectural re-write. You can find out more about Nova 3 in the [Nova 3 user guide](/docs/3.0/introduction).
{% /note %}

## Minor version

A minor version indicates that new features have been added or existing features have been enhanced.

As with all our updates, we aim to include scripts to migrate data to the new version. Minor version migrations should be quick and straightforward and there should be minimal impact to the data on your site.

## Patch version

A patch version, also known as incremental version, indicates bug fixes or other minor changes that only impact the site's functionality in very minor ways.

Patch versions are the most common type of release. As with all of our updates, we aim to include scripts to migrate data to the new version. In most cases, patch versions will not require any data migration since that's beyond the scope of this type of release.

## What version of Nova am I running?

If you're curious what version of Nova your site is running, you can find out by navigating to the **System & Versions** page which can be found at the bottom of the admin control panel navigation sidebar.

In that page, you'll be shown what version of Nova your files are running, what version your database is running, and what version of CodeIgniter is being used.

![System versions](/images/docs/2.6/upgrade-guide/versions.png)
