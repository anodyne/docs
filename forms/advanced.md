---
title: Advanced forms
description: Control many of the forms users use in Nova.
layout: docs
section: Forms
---

## Using your form

From your controller, you will need to query the database for your form. This can be done with the following code:

```php
Nova\Forms\Models\Form::key('your-form-key')->first()
```

The form will need to be passed to the view / Response object so that you can use it in your view.

Using the dynamic form Livewire component, you can pass the various pieces of data to the form:

```html
<livewire:dynamic-form :form="$form" />
```