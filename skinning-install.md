# Uploading & Installing Skins

Learn how to upload and install Nova skins.

---

## Uploading

{WIP}(warning)

## Installing

{WIP}(warning)

## QuickInstall

Nova themes can include a `skin.yml` file which contains basic information about the skin that Nova can use to install the skin for a user.

- The `skin` attribute tells Nova the name of the skin, used for selecting the skin in the Site's Settings and in each user's Site Options.
- The `location` attribute tells Nova where the skin exists in the `application/views` directory. This value is case-sensitive, so be sure to copy the name of the directory exactly.
- The `credits` attribute is text that Nova uses on the credits page that should contain information about the author, where to find the skin, any attribution or inspiration, and any usage license that comes with the skin. This attribute can contain HTML code.

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
