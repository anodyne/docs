# Style Guide

Nova's documentation follows specific styles that authors should adhere to.

---

## Badges

You can use badges to call out specific information in documentation pages. Badges should be on their own line and preferably come at the beginning of a section.

To use a badge, you can write `&lt;x-docs.badge>Content&lt;/x-docs.badge>` within your Markdown file. Nova's documentation site will parse and display the badge correctly.

### Default badges

<x-docs.badge>Default</x-docs.badge>

The default badge is purple and should be the one used most often.

### Danger badges

<x-docs.badge color="red">Danger</x-docs.badge>

You can pass `red` in  the `color` attribute to signify errors and destructive warnings.

### Warning badges

<x-docs.badge color="amber">Warning</x-docs.badge>

You can pass `amber` in  the `color` attribute to signify warnings.