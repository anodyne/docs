---
title: Events
description: Nova provides a robust events system for MODs to listen as actions happen throughout the system.
layout: docs
---

{% $markdoc.frontmatter.description %} {% .lead %}

---

{% callout title="Experimental feature" type="warning" %}
This is an experimental feature, so there could be unexpected issues when using this feature.
{% /callout %}

Nova provides an Events library that allows a sim or mod to define callbacks that are run when an event occurs. While accessible throughout Nova, Events are most useful in the context of building Extensions, as Events allow Extensions to hook into existing Nova functionality.

## Event basics

In order to define a listener, assuming $this is the CodeIgniter content, simply call:

```php
$this->event->listen($eventName, $eventCallback);
```

The `$eventName` may be written as an array of segments or as a string with a `.` separating each.

For example, these two `$eventName` values are identical:

- `['location', 'view', 'output', 'main', 'index']`
- `"location.view.output.main.index"`

The `$eventCallback`, meanwhile, should accept a single `$event` array parameter with data elements that will vary based on the event the listener is listening on.

Putting this all together, one could, for example, append "Hello World!" to the end of the `main/index` view as follows:

```php
$this->event->listen(['location', 'view', 'output', 'main', 'index'], function ($event) {
    $event['output'] .= 'Hello World!';
});
```

Or:

```php
$this->event->listen("location.view.output.main.index", function ($event) {
    $event['output'] .= 'Hello World!';
});
```

Further, one can define an event that will occur over an entire namespace of events.

For example, one could add controller class and method info to the body tag of the template of all pages as follows:

```php
$this->event->listen(['template', 'render', 'output'], function ($event) {
  $seg1 = !empty($this->uri->segment(1)) ? $this->uri->segment(1) : 'main';
  $seg2 = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : 'index';
  $event['output'] = str_replace(
      '<body',
      '<body data-ci_controller="'.$seg1.'" data-ci_method="'.$seg2.'"',
      $event['output']
  );
});
```

In the event that multiple listeners are defined, they will be executed in order of most-specific to least-specific, and if two listeners are defined for the exact same route, then the one that was attached first will run first.

For example, given these callbacks:

```php
$this->event->listen(['location', 'view', 'output'], function ($event) {
    $event['output'] .= 'c';
});

$this->event->listen(['location', 'view', 'output'], function ($event) {
    $event['output'] .= 'd';
});

$this->event->listen(['location', 'view', 'output', 'main', 'index'], function ($event) {
    $event['output'] .= 'a';
});

$this->event->listen(['location', 'view', 'output', 'main', 'index'], function ($event) {
    $event['output'] .= 'b';
});
```

The following string would be added to the end of the output:

```
abcd
```

Nova provides a number of listeners listed in this article. All of these listeners support the resolution paradigm above. Each of these listeners expose different elements in their callback data, such as the data sent to a view or template, the output rendered for a view or template, the data sent to a database insert or update operation, and a flag to abort a database deletion operation.

## Available events

### location.view.data.$SECTION.$VIEW

This event allows a listener to manipulate the data that is to be sent to a view. The event array made available to the callback listener includes a data array, passed by reference, which can be manipulated in order to modify, append or remove data before it is passed to the view to be rendered.

Input Segments:

- `$SECTION` - The view section, such as main or admin.
- `$VIEW` - The view name, such as personnel_character or characters_bio.

Callback Data:

- `data` - The data object that will be sent to the view.

Example:

```php
$this->event->listen(['location', 'view', 'data', 'main', 'personnel_character'], function ($event) {
  $id = $this->uri->segment(3);
  $char = $this->char->get_character($id);
  $content = fms_character**api**get_character($char);
  $event['data']['fms_character'] = json_decode($content, true);
});
```

### location.view.output.$SECTION.$VIEW

This event allows a listener to manipulate the output of a view once it has been rendered. The event array made available to the callback includes an output string, passed by reference, which can be manipulated in order to modify the output rendered by the view, or to even replace it all together. The event array also includes a data array of the data that was used to render the view.

Input Segments:

- `$SECTION` - The view section, such as main or admin.
- `$VIEW` - The view name, such as personnel_character or characters_bio.

Callback Data:

- `data` - The data object that was sent to the view to get the output.
- `output` - The string that was produced after data was sent to the view.

Example:

```php
$this->event->listen(['location', 'view', 'output', 'main', 'personnel_character'], function ($event) {
  $event['output'] .= $this->extension['jquery']['generator']
                  ->select('#tabs')
                  ->append($this->extension['fms_character']->view('personnel_character', $this->skin, 'main', $event['data']));
});
```

### template.render.data.$ROUTERCLASS.$ROUTERMETHOD

This event allows a listener to manipulate the data that is to be sent to a template. The event array made available to the callback listener includes a data array, passed by reference, which can be manipulated in order to modify, append or remove data before it is passed to the template to be rendered.

Input Segments:

- `$ROUTERCLASS` - The controller class as resolved by the router.
- `$ROUTERMETHOD` - The controller method as resolved by the router.

Callback Data:

- `data` - The data object that will be sent to the view.

Example:

```php
$this->event->listen(['template', 'render', 'data'], function ($event) {
  $seg1 = !empty($this->uri->segment(1)) ? $this->uri->segment(1) : 'main';
  $seg2 = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : 'index';
  $event['data']['javascript'] .= '<script type="text/javascript">
    $(document).ready(function() { $("body").addClass("ci-route--'.$seg1.'--'.$seg2.'");});
  </script>';
});
```

### template.render.output.$ROUTERCLASS.$ROUTERMETHOD

This event allows a listener to manipulate the output of a template once it has been rendered. The event array made available to the callback includes an output string, passed by reference, which can be manipulated in order to modify the output rendered by the template, or to even replace it all together. The event array also includes a data array of the data that was used to render the template.

Input Segments:

- `$ROUTERCLASS` - The controller class as resolved by the router.
- `$ROUTERMETHOD` - The controller method as resolved by the router.

Callback Data:

- `data` - The data object that was sent to the template to get the output.
- `output` - The string that was produced after data was sent to the template.

Example:

```php
$this->event->listen(['template', 'render', 'output'], function ($event) {
  $seg1 = !empty($this->uri->segment(1)) ? $this->uri->segment(1) : 'main';
  $seg2 = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : 'index';
  $event['output'] = str_replace(
      '<body',
      '<body data-ci_controller="'.$seg1.'" data-ci_method="'.$seg2.'"',
      $event['output']
  );
});
```

### db.insert.prepare.$TABLE.$ROUTERCLASS.$ROUTERMETHOD

This event allows a listener to manipulate the data to be inserted into a database table before it is inserted. The event array made available to the callback listener includes a data array, passed by reference, which can be manipulated in order to modify, append or remove data before it is inserted into the table. The event array also includes a table string for cases where the listener is defined over the entirety of the db.insert.prepare namespace.

Input Segments:

- `$TABLE` - The name of the table into which the data will be written.
- `$ROUTERCLASS` - The controller class as resolved by the router.
- `$ROUTERMETHOD` - The controller method as resolved by the router.

Callback Data:

- `data` - The data to be inserted into the table.
- `table` - The name of the table.

Example:

```php
$this->event->listen(['db', 'insert', 'prepare', 'characters', 'main', 'join'], function ($event) {
  if(empty($event['data']['fms_character_url']) && $this->input->post('fms_character_url', true))
    $event['data']['fms_character_url'] = $this->input->post('fms_character_url', true);
});
```

### db.update.prepare.$TABLE.$ROUTERCLASS.$ROUTERMETHOD

This event allows a listener to manipulate the data to be updated for an existing record in a database table. The event array made available to the callback listener includes a data array, passed by reference, which can be manipulated in order to modify, append or remove data before it is update in the table. The event array also has where and limit entries, passed by reference, which can be manipulated to adjust the scope of the update. Finally, the event array also includes a table string for cases where the listener is defined over the entirety of the db.insert.prepare namespace.

Input Segments:

- `$TABLE` - The name of the table into which the data will be written.
- `$ROUTERCLASS` - The controller class as resolved by the router.
- `$ROUTERMETHOD` - The controller method as resolved by the router.

Callback Data:

- `data` - The data to be inserted into the table.
- `table` - The name of the table.
- `where` - The where constraint defined in the update call.
- `limit` - The limit constraint defined in the update call.

Example:

```php
$this->event->listen(['db', 'update', 'prepare', 'missions'], function ($event) {
  if(empty($event['data']['mission_start']))
    $event['data']['mission_start'] = null;
  if(empty($event['data']['mission_end']))
    $event['data']['mission_end'] = null;
});
```

### db.delete.prepare.$TABLE.$ROUTERCLASS.$ROUTERMETHOD

This event allows a listener to manipulate the delete operation executed on a table. The event array made available to the callback listener includes an abort boolean where, if set true, will prevent the delete operation from being executed. Additionally, the event array also has where, limit and resetData entries, passed by reference, which can be manipulated to adjust the scope of the update. Finally, the event array also includes a table string for cases where the listener is defined over the entirety of the db.delete.prepare namespace.

Input Segments:

- `$TABLE` - The name of the table into which the data will be written.
- `$ROUTERCLASS` - The controller class as resolved by the router.
- `$ROUTERMETHOD` - The controller method as resolved by the router.

Callback Data:

- `abort` - A boolean where, if set true, will prevent the delete operation from occuring.
- `table` - The name of the table.
- `where` - The where constraint defined in the delete call.
- `limit` - The limit constraint defined in the delete call.
- `resetData` - The reset_data parameter defined in the delete call.

Example:

```php
$this->event->listen(['db', 'delete', 'prepare', 'users'], function ($event) {
  if(!my_custom_auth_check()){
    $event['abort'] = true;
    redirect('my_errors/not_allowed_to_delete', 'refresh');
  }
});
```
