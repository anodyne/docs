# Libraries

Learn about Nova's most powerful tools: libraries.

---

## What is a library?

Libraries are simply PHP classes that can be used for whatever you need them to be used for.

:::info Deep Dive
You can read more about CodeIgniter's libraries in their [documentation](https://codeigniter.com/userguide2/general/libraries.html).
:::

By default, Nova autoloads several libraries that are used extensively throughout the core. Because of that, you'll always have access to the following libraries without having to load them:

- template
- menu
- auth
- event
- user_panel
- location
- util

Any other libraries you want to use will have to be loaded before you can use them:

```php
// Load the library
$this->load->library('mail');

// Now use it
$this->mail->send();
```

:::note
All of Nova's available libraries can be found in the `nova/modules/core/libraries` directory.
:::

## Extending libraries

In order to provide as much flexibility as possible, Nova is split up into two distinct layers: the core and the application. Any work Anodyne does on Nova lives inside "the core". Any work that you do on your game's site is "the application". This is done to ensure that any update to Nova doesn't reset the changes you've made to your installation of Nova.

### Core libraries

The "core" layer of Nova is considered anything that lives **inside** the `nova` directory. (As an aside, this is what allows for the simplicity of just replacing the `nova` directory when updating to the latest version.)

When it comes to libraries, you'll find that all of Nova's core libraries are located in the `nova/modules/core/libraries` directory. To avoid naming conflicts, all of Nova's core libraries are prefixed with `nova_`.

### Application libraries

The "application" layer of Nova is considered anything that lives **outside** of the `nova` directory.

When it comes to libraries, all of Nova's application libraries are located in the `application/libraries` directory. Nova comes with all of the needed libraries out of the box, but if you want to create new libraries, you can add your own libraries here.

### Customizations

When you open an application library, you'll see a file that looks something like this:

```php
require_once MODPATH.'core/libraries/Nova_auth.php';

class Auth extends Nova_auth {}
```

Nova starts by pulling in the core library. This allows us to use the PHP class that we defined in the core. Once that file is loaded, we can extend the application library with the core library. Because of PHP's inheritance, this means you can add any new methods you want to this class and you'll be able to use those library methods in Nova. This also means is that you can *override* any existing method with one of your own by adding a method of the same name in your application library.

:::tip
When it comes to overriding a library method, the recommended way of doing that is to copy the method from the core library and paste it into the application library. You then have a working copy of the method from which to modify whatever you want.
:::

## Further reading

- [Creating your own libraries](https://codeigniter.com/userguide2/general/creating_libraries.html)
