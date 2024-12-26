---
title: Mailgun
description: Setting up Nova 2 to send email through Mailgun.
layout: docs
section: Email Integration Guide
---

[Mailgun](https://mailgun.com) is a transactional email service designed to help with email delivery. You can get started today by creating a free Mailgun account that allows for sending up to 100 emails per day. (If you need more, you'll need to sign up for a paid account.) Once you have your account setup, you can integrate with Nova with only a few steps.

## Create an API key

To start, create an API key from the Mailgun dashboard. Once you've done that, you'll be able to use the API key as your password in Nova's configuration file.

## Add a custom domain

Mailgun will require that you add your domain. You will be provided several DNS records that will need to be added with your domain registrar (where you bought the domain name). After that's complete and Mailgun has verifid that everything is correct, you can configure Nova.

## Update Nova's email configuration

After you've completed the above steps, you can update Nova's email configuration file found at `application/config/email.php` with the following information:

```php
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.mailgun.org';
$config['smtp_user'] = '{YOUR_SMTP_USERNAME}';
$config['smtp_pass'] = '{YOUR_SMTP_PASSWORD}';
$config['smtp_port'] = 587;
$config['smtp_crypto'] = false;
```

Ensure the configuration file has been saved and uploaded to the server.

{% note title="Something not quite right?" %}
If something above doesn't work, it's possible that changes have been made to Mailgun's SMTP integration. You can view their [documentation](https://documentation.mailgun.com/docs/mailgun/user-manual/sending-messages/#send-via-smtp) for the latest version of the SMTP integration instructions.
{% /note %}
