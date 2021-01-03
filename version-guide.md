# Version Guide

Learn about how Nova versions its software and determine when you may need to apply an update to your system.

---

Nova's release cycle will be maintained under the [Semantic Versioning](http://semver.org) guilelines as much as possible. Releases will be numbered with the follow format:

```php
{major}.{minor}.{patch}
```

Below are some examples of valid version numbers:

- `1.0.0`
- `1.0.9`
- `2.3.0`
- `2.6.1`

These version numbers are constructed with the following guidelines:

- **Major Version**: this will only change when there has been a major architectural change to Nova and significant changes that could break backwards compatibility. It is possible that while major versions will include update scripts, some data may not be able to be retained through a major version update. We will do our best to avoid and limit these situations.
- **Minor Version**: an increase to the minor version indicates new features or the enhancement of an existing feature. Minor versions will come with an update script and there should be little to no impact on existing data.
- **Patch Version**: this is the most common change to the version number and indicates bug fixes or other changes that only impact functionality in very minor ways. Edit version updates will come with an update script but will never impact existing data in a way where that data is not retained during the update process.

For more information on Semantic Versioning, please visit [SemVer.org](http://semver.org).
