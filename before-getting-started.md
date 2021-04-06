# Before Getting Started

Here are a few things you should know before using Nova 2.

---

## Web host

Nova is web-based software which means that you'll need to have a server to store your files so players can access your game's site. There are a wide range of web hosts available that range from free to a few bucks a month to very expensive that will cover any possible need you could have. Generally free web hosts will work fine, but if you have the budget to spend a few bucks a month, you'll get far better support and stability.

To make it easier to choose a web host, we've compiled a list of web hosts that play nice with Nova 2 out of the box (and warnings about some that don't) that you can see [here](https://github.com/anodyne/hosts).

### Prerequisites

Nova is built on two core technologies: PHP and MySQL. That means that when picking a web host it's critical that your web host have PHP and MySQL available as part of the hosting plan. If you use the list linked above, all those hosts have the necessary requirements. If you've found a host not on that list, it's important to know that Nova 2 has a few server requirements:

- PHP 5.3 or higher (*PHP 5.6 recommended*)
- MySQL 5.0 or higher (*MySQL 5.7 recommended*)

:::question What about PHP 7 and PHP 8?
While PHP 7 has been available for several years now, Nova 2 is built on a legacy framework that was created long before PHP 7. That means that while Nova 2 will work on PHP 7, there are many errors that could potentially pop up that you would have to work through. Depending on your level of comfort with these kinds of things, it may be better to select a web host that allows you to use PHP 5.6 for your game's site.

PHP 8 has only recently been released and introduces a significant number of changes. We currently have no plans to test Nova 2 against PHP 8 for compatibility. We recommend to avoid using PHP 8 on a Nova 2 site.
:::

## Custom domain name

One avenue that some games choose to go down is purchasing a custom domain name. This can be a great way to give your game even more personality instead of using a domain name or subdomain given to you by your web host.

Out of the box, Nova supports custom domain names and there's nothing you'll need to do to get it working. You'll just need to purchase the domain name from your registrar of choice and work with your web host to get everything wired up properly.

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
