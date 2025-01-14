---
title: Version numbers
description: Learn what version numbers mean for your site.
layout: docs
section: Resources
---

Nova follows a principle called [semantic versioning](http://semver.org) to guide its releases. The purpose of semantic versioning is to make it easy for users to understand what changes to expect in a new release just by looking at the version number.

Version numbers typically follow the format **X.Y.Z**. To explain how it works, we’ll use the example **3.1.7** as we break down each part of the version number for consistency. Let’s start with the first number.

## First Number - 3.1.7 (Major Updates)

The first number in the version (e.g., the **3** in **3.1.7**) represents the **MAJOR version** of the software. This number changes only when there’s a significant update that could potentially break compatibility with previous versions. In Nova, major version updates typically occur when architectural changes are made to the software.

Our goal with any major update is to migrate as much of your data as possible to the new version. However, due to the scope of changes introduced in major updates, there may be some cases where certain data cannot be migrated.

## Second Number - 3.1.7 (Minor Updates)

Sometimes, we introduce new features or make small improvements to Nova that don’t warrant a full major version update. These changes might include adding a useful feature or consolidating functions to make things more efficient. In these cases, we bump up the second number in the version (e.g., from **3.1.7** to **3.2.0**). This signals to users, “Hey, there are some nice updates here — not a complete overhaul, but still worth checking out.”

Even though these updates aren’t as significant as major version upgrades, they’re still important to install so you can take advantage of the latest improvements.

As always, we strive to include scripts that migrate your data seamlessly to the new version. Minor version updates are designed to be quick and easy, with minimal impact on your site’s data.

## The Last Number - 3.1.7 (Patch Updates)

The last number in a version (e.g., the **7** in **3.1.7**) represents patches. While it’s the smallest change in the version number, it’s arguably the most important. Patch updates typically address bugs, which can range from minor issues to critical security fixes. These updates are essential for keeping your site secure and functioning properly, so it’s always a good idea to apply them as soon as possible. Running outdated software is never a good thing.

It’s worth noting that patch numbers aren’t limited to a single digit. For example, a version might go from **3.1.9** to **3.1.10** before reaching **3.2.0**. The patch number will continue to increase as long as updates only involve bug fixes. When new features are introduced, the minor version (the second number) will be updated instead.

As with all Nova updates, we aim to include scripts to migrate data to the new version. However, patch updates usually don’t require any data migration, making them quick and easy to apply.

## What version of Nova am I running?

If you’re curious about what version of Nova your site is running, you can easily find out by visiting the **System Overview** dashboard. This page is located at the bottom of the admin control panel’s navigation sidebar.

On the **System Overview** dashboard, you’ll see detailed information about your site, including:

- The version of Nova your files are running.
- The version of Nova your database is running.
- The version of Laravel your site is using.
- The version of PHP your server is running.
- Key configuration details, such as your default theme and email driver.

This page provides a comprehensive overview of your system, helping you stay informed about your site’s setup.
