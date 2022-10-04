---
title: Version numbers
description: Learn what version numbers mean for your site.
layout: docs
---

{% $markdoc.frontmatter.description %} {% .lead %}

---

Nova releases are guided by a principle known as [semantic versioning](http://semver.org). The goal of semantic versioning is to ensure that users know what to expect when a new version of software is released based solely on the version number itself.

A version number is typically going to be in the format of X.X.X. Let's look at the first number and start there, but for all of these we'll be using the example of 2.7.14 so we have a consistent example to use as we go over each piece of the version number.

## First Number - 2.7.14 (Major Updates)

The first number is going to refer to which MAJOR version the software is on. This number only changes when there has been a huge, potentially project-breaking update. Generally speaking, we've only updated the major version when making architectural changes to Nova.

The goal with any major update to Nova is to ensure we're able to migrate as much of your data from one version to the next. However, with major versions, some data may not be able to be migrated due to the nature of the changes that are being introduced.

{% callout title="You should know!" %}
The next major version of Nova will be Nova 3.0 as it includes an architectural re-write. You can find out more about Nova 3 in the [Nova 3 user guide](/docs/3.0/introduction).
{% /callout %}

## Second Number - 2.7.14 (Minor Updates)

There will be times where we want to add new features to Nova, and maybe they're not even all that groundbreaking. Maybe we're consolidating a few functions to make things more lightweight. Either way, this is a small change that isn't quite enough to merit a full version update. So instead, we bump up the second number. It's a way to let people know that "Hey, this isn't a full-on overhaul, but there is some neat stuff being added that you may like". So even though it may not seem as important as a *true* version update, it's still important to make sure you update Nova.

As with all our updates, we aim to include scripts to migrate data to the new version. Minor version migrations should be quick and straightforward and there should be minimal impact to the data on your site.

## The Last Number - 2.7.14 (Patch Updates)

This is the smallest, but some may argue the most important aspect of version numbers. The last number represents patches. This commonly means that some bugs have been fixed, which can be anything from a super-trivial issue to something as big as a security fix. These often carry the most weight, at least from a certain point of view, and should definitely be updated as soon as possible. Out of date software is never a good thing.

But that's mostly it for the numbers, save for one other thing. Notice the last number is a 14, having two digits instead of one. Just because one update is 7.2.9, doesn't mean the next one is going to be 7.3.0. As long as it's just patches being made, the bottom number will continue to increase until new features are added to merit an increase of the "Minor" version.

As with all of our updates, we aim to include scripts to migrate data to the new version. In most cases, patch versions will not require any data migration.

## What version of Nova am I running?

If you're curious what version of Nova your site is running, you can find out by navigating to the **System & Versions** page which can be found at the bottom of the admin control panel navigation sidebar.

In that page, you'll be shown what version of Nova your files are running, what version your database is running, and what version of CodeIgniter is being used.

{% screenshot src="/images/docs/2.7/upgrade-guide/versions.png" alt="system versions" /%}
