# Versioning

Learn about Nova version numbers

---

Nova releases are guided by a principle known as [semantic versioning](http://semver.org). The goal of semantic versioning is to ensure that users know what to expect when a new version of software is released based solely on the version number itself.

![Version numbers](/images/docs/2.6/versioning/version-number.png)

## Major version

A major version will only be released when there have been major architectural or API changes made that could break backwards compatibility. It's possible that major versions will include scripts to migrate data to the new version, but some data may not be able to be migrated due to the nature of the sweeping changes a major version would introduce. We do our best to avoid and limit these situations though.

## Minor version

A minor version indicates that new features have been added or existing features have been enhanced. Minor versions will always come with scripts to migrate your site to the latest version and there should be little to no impact on your existing data.

## Patch version

The most common type of release is a patch release. This usually indicates bug fixes or other minor changes that only impact the site's functionality in minor ways. Patch versions will always come with scripts for migrate your site, but those scripts will never impact existing data in any meaningful way.
