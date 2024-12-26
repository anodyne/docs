---
title: Resend
description: Setting up Nova 2 to send email through Resend.
layout: docs
section: Email Integration Guide
---

[Resend](https://resend.com) is a transactional email service designed to help with email delivery. You can get started today by creating a free Resend account that allows for sending up to 3,000 emails per month. Once you have your account setup, you can integrate with Nova with only a few steps.

## Create an API key

To start, create an API key from the Resend dashboard. Once you've done that, you'll be able to use the API key as your password in Nova's configuration file.

## Verify your domain

In order to send emails from any email address, you will need to verify your domain by adding a DNS record. After adding your domain in the Resend Dashboard, you will need to add several DNS records from your domain registrar (where you bought the domain name). After that's complete and Resend has verified that everything is correct, you can configure Nova.

## Update Nova's email configuration

After you've completed the above steps, you can update Nova's email configuration file found at `application/config/email.php` with the following information:

```php
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.resend.com';
$config['smtp_user'] = 'resend';
$config['smtp_pass'] = '{YOUR_API_KEY}';
$config['smtp_port'] = 465;
$config['smtp_crypto'] = 'tls';
```

Ensure the configuration file has been saved and uploaded to the server. You can then send a test email to yourself to ensure everything arrives as expected. (The contact form is the best option for sending a test.)

{% note title="Something not quite right?" %}
If something above doesn't work, it's possible that changes have been made to Resend's SMTP integration. You can view their [documentation](https://resend.com/docs/send-with-smtp) for the latest version of the SMTP integration instructions.
{% /note %}
