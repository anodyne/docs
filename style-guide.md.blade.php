# Style Guide

Nova's documentation follows specific styles that authors should adhere to.

---

## Badges

You can use badges to call out specific information in documentation pages. Badges should be on their own line and preferably come at the beginning of a section.

To use a badge, you can write `&lt;x-docs.badge>Content&lt;/x-docs.badge>` within your Markdown file. Nova's documentation site will parse and display the badge correctly.

### Default badges

!!Default!!

The default badge is purple and should be the one used most often.

```
!!Default!!
```

### Danger badges

!!Danger!!{: class="badge-danger"}

You can pass a `class` attribute of `badge-danger` to signify errors and destructive warnings.

```
!!Danger!!{: class="badge-danger"}
```

### Warning badges

!!Warning!!{: class="badge-warning"}

You can pass a `class` attribute of `badge-warning` to signify warnings.

```
!!Warning!!{: class="badge-warning"}
```
