# Before Getting Started

Here are a few things you should know before using Nova 3.

---

## Web host

Nova is web-based software which means that you'll need to have a server to store your files on so players can access your game's site. There are lots of web hosts available that range everywhere from free to a few bucks a month to very expensive (these will generally be overkill, but do cover any possible need you could have with Nova or anything else). Generally free web hosts will work fine, but if you have the budget to spend a few bucks a month, you'll get far better support and stability.

To make it easier to choose a web host for your site, we've compiled a list of web hosts that play nice with Nova 3 out of the box (and warnings about some that don't) that you can see [here](https://github.com/anodyne/hosts).

### Prerequisites

Nova is built on two core technologies: PHP and MySQL. When picking a web host it's critical that they have PHP and MySQL available as part of their hosting plans. If you use the list linked above, all those hosts have the necessary requirements to run Nova 3. For any web host you find that's not on that list, it's important to know that Nova 3 has a couple of server requirements:

- PHP 8.1 or higher
- MySQL 8.0 or higher

:::question What if my host doesn't offer PHP 8?
We've chosen PHP 8.1 as a requirement to ensure that Nova is built on the latest versions of software for the longest level of support. If your web host doesn't offer PHP 8, you will need to stick with Nova 2 until they offer PHP 8 as an option.
:::

## Custom domain name

One avenue that some games choose to go down is purchasing a custom domain name. This can be a great way to give your game even more personality instead of using a domain name or subdomain given to you by your web host.

Out of the box, Nova supports custom domain names and there's nothing you'll need to do to get it working. You'll just need to purchase the domain name from your registrar of choice and work with your web host to get everything wired up correctly.

## Tools you might want

Throughout the documentation, you'll see references to uploading files and modifying files. While you can often do this work through cPanel or something similar that your web host offers, the easier option to have an FTP client and text editor available for modifying files and uploading them to the server.

### FTP client

For uploading files to your web host, you'll want to have an FTP client. Check with your web host to see if they have a list of recommended FTP clients based on your operating system. We've found the following FTP clients to work well:

- [Filezilla](https://filezilla-project.org/)
- [Cyberduck](https://cyberduck.io/)
- [Transmit](https://panic.com/transmit/) (Mac only)
- [WinSCP](https://winscp.net/eng/index.php) (Windows only)

### Text editor

For updating files in Nova, you'll want to have a simple text editor. We've found the following text editors to work very well:

- [VS Code](https://code.visualstudio.com)
- [Atom](https://atom.io)
