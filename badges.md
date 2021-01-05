# Badges

---

Badges are an easy way to call out short information in a visually distinct way. These should be on their own line and preferably come at the beginning of a section.

## Basic badge

Notes are a custom CommonMark extension that we've written for the documentation site. They're considered a "fenced" block which means they have both an opening and closing "tags". Other implementations of notes use three colons and we've adopted the same syntax.

{Badge}()

```markdown
{Badge}()
```

## Different badge types

### Default badges

This badge should be the one used most often unless there are specific reasons to use another type of badge. Default badges **must** still have the parentheses at the end or they won't be parsed correctly.

{Badge}()

```markdown
{Badge}()
```

### Danger badges

This type of badge is used to signify errors or destructive warnings.

{Danger}(danger)

```markdown
{Danger}(danger)
```

### Warning badges

This type of badge is used to signify warnings or provide cautionary information to users.

{Warning}(warning)

```markdown
{Warning}(warning)
```
