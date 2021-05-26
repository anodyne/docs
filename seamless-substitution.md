# Seamless Substitution

Learn about how you can tell Nova to use a different version of a file instead of what's in the Nova core.

---

The term "seamless substitution" sounds scarier than it actually is. In a nutshell, this is _how_ Nova looks for files. Instead of always pulling files out of the Nova core, Nova looks in a few different locations _before_ looking in the core for a file. If Nova finds a file named the same as the one it's looking for somewhere other than the Nova core, it'll use the first file it finds.

A system like this is integral to allowing games to modify Nova's core behavior and presentation. This is especially important since editing core Nova files runs the risk of having customizations wiped out when a Nova update is applied.

Let's take a look at where Nova will look for different types of files.

## Ajax

Nova will try to find an Ajax view file (used for asynchronous views) in the following locations and in the following order:

- `application/views/{current_skin}/{section}/ajax`
- `application/views/_base_override/{section}/ajax`
- `nova/modules/core/views/_base/{section}/ajax`

## Assets

Nova will try to find an asset image in the following location:

- `application/assets`

## Combadges

Nova will try to find a combadge image in the following locations and in the following order:

- `application/views/{current_skin}/{section}/images`
- `application/assets/common/{genre}/images`
- `nova/modules/core/views/_base/{section}/images`

## Emails

Nova will try to find an email view file (used for emails sent from Nova) in the following locations and in the following order:

- `application/views/_base_override/emails/{type}`
- `nova/modules/core/views/_base/emails/{type}`

:::note
Emails are available in both `html` and `text` form. If you are modifying an email, you will need to make any changes in both the HTML and text files. Check out the [email documentation](/docs/2.6/emails) for more information about Nova's emails.
:::

## Images

Nova will try to find an image file in the following locations and in the following order:

- `application/views/{current_skin}/{section}/images`
- `application/views/_base_override/{section}/images`
- `nova/modules/core/views/_base/{section}/images`

## Javascript

Nova will try find a Javascript view file (used for Javascript in pages) in the following locations and in the following order:

- `application/views/{current_skin}/{section}/js`
- `application/views/_base_override/{section}/js`
- `nova/modules/core/views/_base/{section}/js`

## Rank images

Nova will try to find a rank image in the following location:

- `application/assets/common/{genre}/ranks/{set}`

## Pages

Nova will try to find a view file (used for pages) in the following locations and in the following order:

- `application/views/{current_skin}/{section}/pages`
- `application/views/_base_override/{section}/pages`
- `nova/modules/core/views/_base/{section}/pages`
