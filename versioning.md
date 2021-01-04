# Versioning

Learn about Nova version numbers

---

Nova releases are guided by a principle known as [semantic versioning](http://semver.org). The goal of semantic versioning is to ensure that users know what to expect when a new version of software is released based solely on the version number itself.

<div class="flex items-center space-x-6">
  <div class="flex flex-col justify-center space-y-2">
    <div class="text-3xl font-bold text-center">2</div>
    <div class="w-full h-1 bg-blue-500 rounded-full"></div>
    <div class="text-xs uppercase tracking-wider text-gray-500 font-medium px-3">major</div>
  </div>
  <div class="flex flex-col justify-center">
    <div class="text-3xl font-bold text-center text-gray-500">.</div>
    <div class="h-1">&nbsp;</div>
    <div>&nbsp;</div>
  </div>
  <div class="flex flex-col justify-center space-y-2">
    <div class="text-3xl font-bold text-center">2</div>
    <div class="w-full h-1 bg-purple-500 rounded-full"></div>
    <div class="text-xs uppercase tracking-wider text-gray-500 font-medium px-3">minor</div>
  </div>
  <div class="flex flex-col justify-center">
    <div class="text-3xl font-bold text-center text-gray-500">.</div>
    <div class="h-1">&nbsp;</div>
    <div>&nbsp;</div>
  </div>
  <div class="flex flex-col justify-center space-y-2">
    <div class="text-3xl font-bold text-center">5</div>
    <div class="w-full h-1 bg-yellow-500 rounded-full"></div>
    <div class="text-xs uppercase tracking-wider text-gray-500 font-medium px-3">patch</div>
  </div>
</div>

## What version numbers mean

- **Major Version**: this will only change when there has been a major architectural change to Nova and significant changes that could break backwards compatibility. It is possible that while major versions will include update scripts, some data may not be able to be retained through a major version update. We will do our best to avoid and limit these situations.
- **Minor Version**: an increase to the minor version indicates new features or the enhancement of an existing feature. Minor versions will come with an update script and there should be little to no impact on existing data.
- **Patch Version**: this is the most common change to the version number and indicates bug fixes or other changes that only impact functionality in very minor ways. Edit version updates will come with an update script but will never impact existing data in a way where that data is not retained during the update process.
