---
title: Troubleshooting
description: Learn about different ways to troubleshoot issues with your Nova site.
layout: docs
section: Resources
---

## Use the Pulsar skin

As simple as it sounds, checking if your issues happens in the Pulsar skin can help figure out if the issue is related to your particular skin or to Nova in general. If you can't reproduce the issue with the Pulsar skin, then you can reach out to the skin developer about the issue.

## Check your browser's developer tools console

If you're using a browser like Chrome or Firefox, you can use the developer tools console to see if there are any JavaScript errors that might be causing issues with your site. Oftentimes this can help the support staff point you in the right direction of getting an issue resolved.

If you're using Chrome (also applies for Arc and Brave), you can open the developer tools by using the View > Developer > View Developer Tools menu. Once they've opened, you can click on the Console tab to see any errors or warnings.

If you're using Firefox, you can open the developer tools by using the Tools > Browser Tools > Web Developer Tools. Once they've opened, you can click on the Console tab to see any errors or warnings.

## Check the error logs

Nova logs a lot of information in its error logs that can be helpful when troubleshooting issues. Nova's error logs can be found in the `application/logs` directory. Each day has its own log which makes it easier to find the errors from a particular day. Here are a few tips for working with the error logs:

- Pay particular attention to the *time* that you refreshed the page and had issues. This will help you narrow down where to look in the error log.
- Notice what the URL of the page you're having an issue with. Oftentimes the URL (or a portion of it) will be shown in the error log.

## Use the development environment

When you install Nova on your server, the environment is set to **production**. This suppresses errors shown on screen and ensures that only specific kinds of errors are logged to the log files. Sometimes though, this can make it difficult to troubleshoot issues that you're seeing on your site, particularing things like blank white screens. If this happens, you can set Nova's environment to **development** and see the errors that Nova may be throwing.

To set your site's environment to development, edit the `index.php` file and find the section about the application environment:

```php
define('ENVIRONMENT', 'production');
```

Change `production` to `development`, save the file, and upload it to your server. Once you refresh the page, you should start to see error messages on screen.

{% warning %}
Make sure that you change the environment back to `production` when you're done troubleshooting!
{% /warning %}

## Re-upload the Nova core

There are times when things just aren't working and you can't figure out why. In those situations, we've found that there's a possibility of some of Nova's core files not working as expected. One simple troubleshooting tip is to download a fresh copy of Nova from the Anodyne site, delete the `nova` directory on your server, and upload a fresh copy to the server. In some cases, that alone is enough to fix issues you're seeing.
