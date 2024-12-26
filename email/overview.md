---
title: Email
description: Understand email in Nova.
layout: docs
section: Core Concepts
---

## How Nova sends emails

Unlike many areas in Nova where we leverage built-in CodeIgniter libraries, for email we use a custom library implementing [SwiftMailer](https://swiftmailer.symfony.com/docs/introduction.html) for sending all emails from Nova. We've built this in such a way that it should mirror the way that CodeIgniter handles email.

When Nova needs to send an email, the controller where that page lives will have a method called `_email` that handles all of the email situations for that controller.

## When Nova sends emails

|Area           |Situation                             |Recipient       |
|---------------|--------------------------------------|----------------|
|Application    |Application accepted                  |The joining user|
|Application    |Application rejected                  |The joining user|
|Application    |Application rejected                  |All game masters|
|Awards         |Award nomination is submitted         |All users with level 2 `user/nominate` permissions|
|Contact form   |Contact form is submitted             |All game masters|
|Docking form   |Docking form is submitted             |The submitting user|
|Docking form   |Docking form is submitted             |All game masters|
|Docking form   |Docking application is accepted       |The submitting user|
|Docking form   |Docking application is rejected       |The submitting user|
|Join form      |Player applies to join                |The submitting user|
|Join form      |Player applies to join                |All game masters|
|Login page     |Player resets their password          |The submitting user|
|Mission post   |Joint mission post saved              |All participating users on the post|
|Mission post   |Mission post published                |All users|
|Mission post   |Approval required for new mission post|All users with level 2 `manage/posts` permissions|
|Mission post   |Comment added                         |The author(s) of the mission post|
|Mission post   |Approval required for new comment     |All users with `manage/comments` permissions|
|Moderation     |Approval of pending comment           |The entity's author(s)|
|Moderation     |Approval of pending mission post      |All users|
|Moderation     |Approval of pending news item         |All users|
|Moderation     |Approval of pending personal log      |All users|
|News item      |News item published                   |All users|
|News item      |Approval required for new news item   |All users with level 2 `manage/news` permissions|
|News item      |Comment added                         |The author of the news item|
|News item      |Approval required for new comment     |All users with `manage/comments` permissions|
|Personal log   |Personal log published                |All users|
|Personal log   |Approval required for new personal log|All users with level 2 `manage/logs` permissions|
|Personal log   |Comment added                         |The author of the personal log|
|Personal log   |Approval required for new comment     |All users with `manage/comments` permissions|
|Private message|A new private message is received     |The recipient|
|User profile   |Password is changed by an admin       |The user|
|User profile   |Leave of absence status is changed    |All game masters|

## Configuring emails from Nova

Nova and CodeIgniter provide a wealth of configuration options for how email is handled. You'll find all of the available configuration options in either Nova's *System/Email* tab of Site Settings or in the email config file found in the `application/config` directory. We've provided sensible defaults for emails, but your specific server and situation may dictate changes.

{% note title="Be sure to test" %}
After making any changes to configuration, you should send a test email through Nova to ensure that all your players are properly receiving email with the changes.
{% /note %}

{% note title="Deep dive" %}
You can read more about CodeIgniter's email configuration options in their [documentation](https://codeigniter.com/userguide3/libraries/email.html).
{% /note %}

## Changing the files used for emails

You might be surprised to find out that Nova treats emails almost identically to how it treats pages in the system. That means there's a view file that's used to structure and lay out the emails that are sent to players. This also means you can use seamless substitution to change the structure and layout of the emails.

{% note title="Learn more" %}
For a complete explanation of seamless substitution, please refer to its [documentation](/docs/2.7/seamless-substitution).
{% /note %}

## Email issues

Over the last couple of years, email has become a *significant* pain point for more and more Nova games. We've heard about tons of people dealing with a whole host of email issues:

- "No one gets emails sent by Nova"
- "Some users get the emails sent by Nova, but others don't"
- "Some emails from Nova take hours to arrive"
- "I get an error when Nova tries to send emails"

By default, Nova uses Sendmail for sending all mail. When the system was originally built, this was a reliable way of handling email. Over time and with the drastic rise in spam, more and more service providers are cracking down on the ways that email has been sent from PHP applications. As a result, people have started to see situations where email isn't being properly delivered. So how do we fix these issues?

### Third-party email service providers

The answer we've begun advocating is using a third-party email service provider. There are companies that offer to handle the sending of emails (also known as transactional emails) from a system like Nova to whatever recipients are on the email. We **highly encourage** users to use a third-party email service provider, and here's why:

1. They specialize in sending emails
2. They will increase your deliverability rate, often dramatically
3. Your emails are less likely to be labeled as “spam” and/or blocked completely (quite common)

### Who's out there?

It can be a little daunting to step into the world of third-party email service providers, so here's a little primer on who's out there, ranging from completely free services to some that charge you monthly for the number of emails you send.

- [Resend](https://resend.com/)
- [SendGrid](https://sendgrid.com/)
- [Mailgun](https://www.mailgun.com/)
- [Postmark](https://postmarkapp.com/)
- [Amazon SES](https://aws.amazon.com/ses/)

If you're having issues today with emails not being delivered, you can get up and running in relatively short order by signing up for one of the above services and plugging in the details in your email config file in Nova.

### Integration guides

Below are the integration guides we've written that will walk you through the process of integrating these third-party email services into Nova.

- [Resend](/docs/2.7/email/integration-resend)
- [Mailgun](/docs/2.7/email/integration-mailgun)
- [SendGrid](/docs/2.7/email/integration-sendgrid)

#### Troubleshooting

If you don't get an email, the first step is to look at the error logs. Sometimes if there's a problem you'll be able to tell from any entries in the error logs. You can also use the SMTP service's dashboard to figure out if the email got to the service. (This goes back to what we talked about earlier about some services requiring additional setup in order to get it working properly.)

### Not interested in third-party email service providers?

If you don't want to pull the trigger on a third-party email service provider, there are other methods you can try that have seen limited success:

- Under **Site Settings** on your Nova site, click on the *System/Email* tab. Scroll down to the bottom of the page and input an email associated with your domain as the "Default Email Address." For example, if you run a game at the domain `uss-enterprise.com`, you'd enter the email `nova@uss-enterprise.com`. (You may need to sign in to your hosting account to create a matching email address for this solution to work properly.)
- If you have the ability, try refreshing your DKIM/SPF records. If you don't know what that means, or if you don't have the ability, contact your web host. (This solves an issue where Google won't deliver your site's emails.)
- If your Nova sends hundreds of emails, your server might have a sending limit that blocks some emails from being delivered. Remember, every time you publish a post Nova has to send an email to *each* user on your site, not only one email. Either contact your web host and ask them to increase the limit or upgrade to a hosting plan with a higher sending limit.
