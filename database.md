---
title: Database
description: Learn how to configure Nova 3.
layout: docs
section: Getting started
---

## MariaDB

### Exceptions

Due to a long-standing bug in MariaDB, deeply nested resources cannot be properly calculated. As a result, Nova will hide certain user interface elements around problematic queries. The following information will not be displayed if you are using MariaDB as your database engine:

- Counts of posts or post words from all included stories
