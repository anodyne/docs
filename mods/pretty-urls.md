---
title: Pretty URLs
description: Out of the box, Nova includes a filename in the URL. Learn how to get rid of that file in the URL.
layout: docs
---

{% $markdoc.frontmatter.description %} {% .lead %}

---

## Apache

If your server is running Apache (your web host will know if you don't), you can create a file named `.htaccess` on the server at the root of your site. The following configuration should work for most servers:


```htaccess
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

## Nginx

If your server is running Nginx (your web host will know if you don't), you'll have to modify one of the servers files to get URL re-writing working properly. You can edit the `/etc/nginx/conf.d/default.conf` file and add the following to your `server` object:

```nginx
location / {
    # Check if a file or directory index file exists, else route it to index.php.
    try_files $uri $uri/ /index.php;
}
```

{% callout title="Know what you're doing" type="warning" %}
Before attempt to make this change, talk to your web host. They may have different ways of handling URL re-writing that are easier and potentially less disruptive to your server.
{% /callout %}
