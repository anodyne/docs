---
title: Getting started
description: Here are a few things you should know before using Nova 3.
layout: docs
section: Getting Started
---

## Web host

Nova is web-based software, which means you’ll need a server to store your files so players can access your game’s site. There are many web hosting options available, ranging from free plans to affordable monthly fees, and even high-end premium services.

While free hosting can work for most basic needs, investing a few dollars a month in a paid hosting plan can offer significant benefits, including better performance, reliability, and customer support. Premium hosting options are generally overkill for Nova but are available if you ever need advanced features or scalability.

### Prerequisites

Nova is powered by two key technologies: PHP and MySQL. When choosing a web host, it’s essential to ensure that their hosting plans support both PHP and MySQL, as these are critical for running Nova.

If you’re using the recommended hosts from the list linked above, you’ll be covered — those hosts meet all the requirements for Nova 3. However, if you’re considering a web host that’s not on the list, it’s important to verify that they meet the following server requirements for Nova 3:

- PHP 8.3+
- The following PHP extensions must be enabled:
  - ctype
  - curl
  - dom
  - fileinfo
  - filter
  - hash
  - intl
  - mbstring
  - openssl
  - pcre
  - pdo
  - session
  - tokenizer
  - xml
- MySQL 8.0+ or MariaDB 10.0+

## Custom domain name

Some games opt to purchase a custom domain name, which is a great way to give your game its own unique identity. A custom domain offers a more personalized touch compared to using a default domain or subdomain provided by your web host.

Nova fully supports custom domain names out of the box, so there’s no extra configuration needed on your end. All you need to do is purchase the domain from your preferred registrar and coordinate with your web host to set it up correctly.

## Tools you might want

Throughout this documentation, you’ll find references to uploading and modifying files. While you can often handle these tasks using tools like cPanel, Plesk, or similar features provided by your web host, it’s usually easier to have two essential tools on hand: an FTP client for uploading files and a text editor for making modifications. These tools simplify the process and give you more control over your workflow.

### FTP client

To upload files to your web host, you’ll need an FTP client. Many web hosts provide a list of recommended FTP clients tailored to your operating system, so be sure to check with them. Based on our experience, the following FTP clients work reliably:

- [Filezilla](https://filezilla-project.org/)
- [Cyberduck](https://cyberduck.io/)
- [Transmit](https://panic.com/transmit/) (paid, Mac only)
- [ForkLift](https://binarynights.com/) (paid, Mac only)
- [WinSCP](https://winscp.net/eng/index.php) (Windows only)

### Text editor

To update files in Nova, you’ll need a simple and reliable text editor. Here are some text editors we recommend:

- [VS Code](https://code.visualstudio.com)
- [Atom](https://atom.io)
- [Zed](https://zed.dev)
- [Notepad++](https://notepad-plus-plus.org) (Windows only)
