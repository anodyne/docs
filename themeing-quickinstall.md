# Themeing - QuickInstall

Learn how to theme Nova to match the style and spirit of your game.

---

Nova themes can include a `skin.yml` file which contains basic information about the theme that Nova can use to install the theme for a user.

- The `skin` attribute tells Nova the name of the theme, used for selecting the theme in the Site's Settings and in each user's Site Options.
- The `location` attribute tells Nova where the theme exists in the `application/views` directory. This value is case-sensitive, so be sure to copy the name of the directory exactly.
- The `credits` attribute is text that Nova uses on the credits page that should contain information about the author, where to find the theme, any attribution or inspiration, and any usage license that comes with the theme. This attribute can contain HTML code.

Here is an example QuickInstall file:

```yaml
skin: Titan
location: titan
credits: The Titan skin was created by Anodyne Productions. Edits are permissible provided the original credits remain intact.
version: 2.0
sections:
  -
    type: main
    preview: preview-main.jpg
  -
    type: wiki
    preview: preview-wiki.jpg
  -
    type: login
    preview: preview-login.jpg
  -
    type: admin
    preview: preview-admin.jpg
```
