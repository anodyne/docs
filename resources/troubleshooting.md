---
title: Troubleshooting
description: Learn about different ways to troubleshoot issues with your Nova site.
layout: docs
---

## Use the Pulsar skin

As simple as it sounds, checking if your issues happens in the Pulsar skin can help figure out if the issue is related to your particular skin or to Nova in general. If you can't reproduce the issue with the Pulsar skin, then you can reach out to the skin developer about the issue.

## Check the error logs

Nova logs a lot of information in its error logs that can be helpful when troubleshooting issues. Nova's error logs can be found in the `application/logs` directory. Each day has its own log which makes it easier to find the errors from a particular day. Here are a few tips for working with the error logs:

- Pay particular attention to the *time* that you refreshed the page and had issues. This will help you narrow down where to look in the error log.
- Notice what the URL of the page you're having an issue with. Oftentimes the URL (or a portion of it) will be shown in the error log.

## Use the development environment

When you install Nova on your server, the environment is set to **production**. This suppresses errors shown on screen and ensures that only specific kinds of errors are logged to the log files. Sometimes though, this can make it difficult to troubleshoot issues that you're seeing on your site, particularing things like blank white screens. If this happens, you can set Nova's environment to **development** and see the errors that Nova may be throwing.

To set your site's environment to development, edit the `index.php` file and find the section about the application environment:

```php
define('ENVIRONMENT', 'development');
```

Change `development` to `production`, save the file, and upload it to your server. Once you refresh the page, you should start to see error messages on screen.

{% warning %}
Make sure that you change the environment back to `production` when you're done troubleshooting!
{% /warning %}