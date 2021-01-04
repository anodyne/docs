# Notes

---

Notes are an easy way to call out information in a visually distinct way. You can use normal *inline* Markdown like bold, italics, links, images etc. within the body of the note.

## Basic note

Notes are a custom CommonMark extension that we've written for the documentation site. They're considered a "fenced" block which means they have both an opening and closing "tags". Other implementations of notes use three colons and we've adopted the same syntax.

```markdown
:::
This is a note.
:::
```

:::
This is a note.
:::

## Different note types

Notes can have a wide variety of types, but they generally fall into 3 categories: default, warning, and success. When you specify a type, it will also create a title with an icon for the note.

### Default note

:::note
This is a normal alert with some **extra** Markdown.
:::

```markdown
:::note
This is a normal note with some **extra** Markdown.
:::
```

You can specify three different types of default notes:

- note (info icon)
- callout (star icon)
- question (question mark icon)

### Warning note

:::warning
This is a warning note.
:::

```markdown
:::warning
This is a warning note.
:::
```

### Success note

:::success
This is a success note.
:::

```markdown
:::success
This is a success note.
:::
```

You can specify two different types of success notes:

- success (checkmark icon)
- tip (lightning icon)

## Custom note title

By default, notes use their type as the title of the note, but sometimes you may want to use a custom title for the note. To specify a custom title, simply write what you would like the title to be after the note type.

:::note Before you begin
This is a note with a custom title.
:::

```markdown
:::note Before you begin
This is a note with a custom title.
:::
```
