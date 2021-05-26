# Emails

Understand how Nova handles email.

---

## How Nova sends emails

## When Nova sends emails

- When a prospective player submits the join form, an email is sent to them with the details of their application
- When a prospective player submits the join form, an email is sent to all users marked as game masters with the details of the application
- When a prospective player's application has been accepted, an email is sent to the player
- When a prospective player's application has been rejected, an email is sent to the player
- When a user resets their password, the user receives an email
- When the contact form is submitted, any users marked as game masters are sent an email
- When a new comment is added to a news item, the author of the news item receives an email
- When a new comment is added to a news item that requires approval, any users with the `manage/comments` permission are sent an email
- When a news item, personal log, mission post, or comment in a pending state is approved, the appropriate user(s) are sent an email
- When a prospective game submits the docking form, an email is sent to them with the details of their application
- When a prospective game submits the docking form, an email is sent to all users marked as game masters with the details of the application
- When a prospective game's application to dock with your game has been accepted, an email is sent to the submitter
- When a prospective game's application to dock with your game has been rejected, an email is sent to the submitter
- When a new private message is sent, the recipient is sent an email
- When a user nominates another user/character for an award, any users with level 2 `user/nominate` permission are sent an email
- When a user's password is reset for them, an email is sent to them with the details
- When a user's status is changed, an email is sent to all users marked as game masters
- When a mission post with multiple authors is saved, all participants receive a notification
- When a news item, personal log, or mission post is posted, all users who have opted in to receive those particular notifications receive an email

## Configuring emails from Nova

## Changing the files used for emails

You might be surprised to find out that Nova treats emails almost identically to how it treats pages in the system. That means there's a view file that's used to structure and lay out the emails that are sent to players. This also means you can use seamless substitution to change the structure and layout of the emails.

:::note
For a complete explanation of seamless substitution, please refer to its [documentation](/docs/2.6/seamless-substitution).
:::

## Email issues

Over the last couple of years, email has become a *significant* pain point for more and more Nova games. We've heard about tons of people dealing with a whole host of email issues:

- "No one gets emails sent by Nova"
- "Some users get the emails sent by Nova, but others don't"
- "Some emails from Nova take hours to arrive"
- "I get an error when Nova tries to send emails"

Nova's default email system uses your server to send emails. The problem with this is that every server has a different configuration and it might not like having emails sent from an application like Nova. That is why using the default server email is not recommended. So how do we fix this issue?

### Third-party email service providers

The answer we've begun advocating is using a third-party email service provider. These are companies that offer to handle the sending of emails (also known as transactional emails) from a system like Nova to whatever recipients are on the email. We **highly encourage** users to use a third-party email service provider, and here's why:

1. They specialize in sending emails
2. They will increase your deliverability rate, often dramatically
3. Your emails are less likely to be labeled as “spam” and/or blocked completely (quite common)

### Who's out there?

It can be a little daunting to step into the world of third-party email service providers, so here's a little primer on who's out there, ranging from completely free services to some that charge you monthly for the number of emails you send.

- [SendGrid](https://sendgrid.com/)
- [Mailgun](https://www.mailgun.com/)
- [Postmark](https://postmarkapp.com/)
- [SparkPost](https://www.sparkpost.com/)
- [MailChimp](https://mailchimp.com/)
- [Amazon SES](https://aws.amazon.com/ses/)
- [SendPulse](https://sendpulse.com/)
- [MailJet](https://www.mailjet.com/)
- [SendinBlue SMTP](https://www.sendinblue.com/)
- [ElasticEmail](https://elasticemail.com/)

:::note
It's important to understand that there may be additional work that has to be done for some of these services. For example, Mailgun requires domain verification before you can send emails. While it's a technical process, Mailgun has documentation that will walk you through updating the DNS records. In other cases, these are relatively new services that we don't have much information on. We encourage people to look at the different options and make decisions based on what they think their needs will be.
:::

Any of the above SMTP services will work in Nova. If you're having issues today with emails not being delivered, you can get up and running in short order by signing up for one of the above services and plugging in the details in your email config file in Nova.

In order to get Nova working with your SMTP service of choice, you simply need to update the `application/config/email.php` config file with the information you got from the service when you signed up:

```php
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'http://smtp.example.com';
$config['smtp_user'] = 'username';
$config['smtp_pass'] = 'password';
$config['smtp_port'] = 25;
```

Save the file and upload it back to your server and you should be all set!

You can run a test by using the contact form to send something to yourself. If everything is working, you should get the contact page email like normal. If you don't get the email, you may need to use the SMTP service's dashboard to figure out if the email got to the service. (This goes back to what we talked about earlier about some services requiring additional setup in order to get it working properly.)

### Not interested in third-party email service providers?

If you don't want to pull the trigger on a third-party email service provider, there are other methods you can try that have seen limited success:

- Under **Site Settings** on your Nova site, click on the *System/Email* tab. Scroll down to the bottom of the page and input an email associated with your domain as the "Default Email Address." For example, if you run a game at the domain `uss-enterprise.com`, you'd enter the email `nova@uss-enterprise.com`. (You may need to sign in to your hosting account to create a matching email address for this solution to work properly.)
- If you have the ability, try refreshing your DKIM/SPF records. If you don't know what that means, or if you don't have the ability, contact your web host. (This solves an issue where Google won't deliver your site's emails.)
- If your Nova sends hundreds of emails, your server might have a sending limit that blocks some emails from being delivered. Remember, every time you publish a post Nova has to send an email to *each* user on your site, not just one email. Either contact your web host and ask them to increase the limit or upgrade to a hosting plan with a higher sending limit.
