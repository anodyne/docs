---
title: Pretty URLs
description: Configure the server to show cleaner URLs.
layout: docs
section: Resources
---

## Nginx

If your site is on a server running Nginx, add the following directive in your site configuration to direct all requests to the `index.php` front controller:

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## Apache

If your site is on a server running Apache, you'll need to check with your web host and ensure that the `mod_rewrite` module is enabled so the `.htaccess` file will be honored by the server.

Nova comes with a `.htaccess` that you should have uploaded before you installed Nova. You are free to modify the file according to your server's needs. If you don't see the file at the root directory, you can create it and paste the following code in:

```apacheconf
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```
