---
title: Skinning Nova - Customizing
description: Several of Anodyne's Nova skins allow for personalization.
layout: docs
---

{% $markdoc.frontmatter.description %} {% .lead %}

---

The included Pulsar and Titan skins released with Nova 2.7 were given a much-needed visual refresh. In addition, there are some customization options that make it easier to personalize your site.

## Changing the header logo

If you want to change the logo used in the header of the skin or at the top of the login page, you can upload an image named `logo` into the `dist/images` folder of the Pulsar or Titan skins. The skin will see that image and use it instead of the included Nova logo. Supported file formats for replacing the header logo are PNG, SVG, or JPG.

## Changing the skin colors

Sometimes you don't need to make wholesale changes to a skin and just want to update the colors. The Pulsar and Titan skins leverage CSS variables to make it simple to change the different colors used throughout the skins.

### Generating a new color palette

There are a lot of websites that allow you to create color palettes. We recommend using [UIColors.app](https://uicolors.app/create) since it's simple to use and will output colors in a way that is compatible with Tailwind CSS.

Enter the color you want to use as the base for your color palette and it will create the full color scale for you. You're welcome to edit the colors to your liking. When you're done, you'll need to export the colors and copy the output (which should look like the below block of code) into a separate text document:

```json
'royal-blue': {
    '50': '#f0f4fe',
    '100': '#dde6fc',
    '200': '#c3d4fa',
    '300': '#99b9f7',
    '400': '#6995f1',
    '500': '#406ceb',
    '600': '#3051e0',
    '700': '#273fce',
    '800': '#2634a7',
    '900': '#243184',
},
```

You can delete the `900` record as we will not use that one.

### Convert the colors to RGB

Once you have a color palette, you'll need to [convert](https://www.rapidtables.com/convert/color/index.html) the hex colors to RGB values. This is done so that we can use background opacity on the colors properly.

{% callout type="warning" title="Don't skip this step!" %}
The skin will not display correctly if you skip this step!
{% /callout %}

- Copy the `50` hex value
- Paste into the converter
- Convert to RGB
- Take the 3 values and put them next to the hex value, separated by commas, for easy copying later

```json
'royal-blue': {
    '50': '#f0f4fe', 240, 244, 254
    ...
},
```

### Update the CSS variables

Open `dist/css/colors.css` of the Pulsar or Titan skins. In there, you'll see a complete list of the CSS color variables. We use a primary color and then colors for different states (success, danger, warning, and info). Do not change the name of the CSS variable as that will break the skins.

To finish the process, simply go down the list and replace the values with the comma-separate RGB values. For example, you'll take the RGB value for the `50` item and paste it into the `100` value. After you've done the first value, it should look something like this:

```css
:root {
    --primary-100: 240, 244, 254;
    ...
}
```

Continue working through the variables (being careful to pay attention to which colors you're updating) and update all 9 shades of the color palette. Save the document and make sure it's uploaded to the server. Refresh your site and you should see the new colors. You can do this for any or all of the available color variables to customize the look of your site.