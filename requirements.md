---
title: Requirements
description: Nova 3 has several requirements for servers and browsers.
layout: docs
section: Getting Started
---

## Browser

As of 3.0, Nova is designed for and tested on the latest stable versions of Chrome, Firefox, Edge, and Safari. Nova 3 does not support any version of IE.

If you need to support IE 11 or older versions of Edge, we recommend using Nova 2.

{% note %}
Due to the use of the `:has` CSS selector, you will need to be using Firefox version 121 or higher. There is no UI to indicate if you are on an incompatible version of Firefox, but many things in the user interface will not look correct.
{% /note %}

## Server

- PHP 8.3 or higher
- The following PHP extensions must be enabled:
  - ctype
  - curl
  - dom
  - fileinfo
  - filter
  - hash
  - intl
  - mbstring
  - openssl
  - pcre
  - pdo
  - session
  - tokenizer
  - xml

## Database

- MySQL 8.0 or higher
- MariaDB 10.0 or higher
