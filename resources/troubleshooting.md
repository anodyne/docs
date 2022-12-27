---
title: Troubleshooting
description: Learn about different ways to troubleshoot issues with your Nova site.
layout: docs
---

## Using the development environment

When you install Nova on your server, the environment is set to **production**. This suppresses errors shown on screen and ensures that only specific kinds of errors are logged to the log files. Sometimes though, this can make it difficult to troubleshoot issues that you're seeing on your site, particularing things like blank white screens. If this happens, you can set Nova's environment to **development** and see the errors that Nova may be throwing.

To set your site's environment to development, edit the `index.php` file and find the section about the application environment:

```php
define('ENVIRONMENT', 'development');
```

Change `development` to `production`, save the file, and upload it to your server. Once you refresh the page, you should start to see error messages on screen.

{% note %}
You can *generally* safely ignore anything that's marked as a warning by PHP. What you'll be most interested in are any of the errors.
{% /note %}