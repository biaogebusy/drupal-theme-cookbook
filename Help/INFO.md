* [Theme Info]
  * [Set Theme information](#theme-config)
    * [Set theme name](#theme-name)
    * [Set theme Description](#theme-description)
    * [Set theme Others](#theme-description) - Set theme version,
  core, engine  
  * [Add style files](#Add-style-files)
    * [Gobal style](#gobal-style)
    * [Print style](#print-style)
    * [Responsive style](#responsive-style)
  * [Add javascript files](#Add-javascript-files)
  * [Set Regions](#drupal-regions)
    * [Default region](#default-region)
    * [Custom region](#custom-region)
  * [Set features](#Set-features)
    * [Default Features](#default-features)
  * [Set Theme settings](#set-theme-settings)
    * [Add Theme default settings](#add-theme-default-settings)
    * [Add Theme custom settings](#add-theme-custom-settings)
  * [Exclude CSS and JS](#exclude-css-and-js)
    * [Exclude javascript](#exclude-javascript)
    * [Exclude css](#exclude-css)
      * [Exclude system css](#exclude-system-css)
      * [Exclude modules css](#exclude-modules-css)
  * [Drupal theme info Documents](https://www.drupal.org/node/171205)


## Theme Config

### Theme Screenshot image
> screenshot  = screenshot.png

### Theme Name
> name = Drupal Theme Cookbook / WENUI

### Theme Description
> description = Faster and easier web development.

### Theme Others settings
> version     = 2.0.0  
> core        = 7.x  
> engine      = phptemplate  

## Add style files
[Drupal Documents](https://www.drupal.org/node/171209) - from drupal.org

### Gobal style
> stylesheets[all][] = css/bundle.css

### Print style
>stylesheets[print][] = css/print.css

### Responsive style
> stylesheets[screen and (max-width: 320px)][]  = mobi.css   
> stylesheets[screen and (max-width: 1024px)][] = table.css


## Add JavaScripts files.
> scripts[] = init.js


## Drupal Regions

### Add Default region
*drupal7 default region / If not well, please don't remove.*

```bash
regions[sidebar_first]  = Left sidebar
regions[sidebar_second] = Right sidebar
regions[content]        = Content
regions[header]         = Header
regions[footer]         = Footer
regions[highlighted]    = Highlighted
regions[help]           = Help
regions[page_top]       = Page Top
regions[page_bottom]    = Page Bottom
```

### Add Custom Region
```bash
regions[outside]        = Outside
```

## Set features

### Add Default features
```bash
features[] = logo
features[] = name
features[] = slogan
features[] = node_user_picture
features[] = comment_user_picture
features[] = comment_user_verification
features[] = favicon
features[] = main_menu
features[] = secondary_menu
```



## Set Theme settings
*Set settings on the theme-settings.php.*

### Add Theme default settings
```bash
settings[toggle_logo]                      = 1
settings[toggle_name]                      = 1
settings[toggle_slogan]                    = 1
settings[toggle_favicon]                   = 1
settings[toggle_main_menu]                 = 1
settings[toggle_secondary_menu]            = 1
settings[toggle_node_user_picture]         = 1
settings[toggle_comment_user_picture]      = 1
settings[toggle_comment_user_verification] = 1
```

### Add Theme Custom settings
*Add Custom meta if need*
> // settings[mobi_meta][] = mobi

*[Add Theme / rebuild Setting function here](https://github.com/wenroo/drupal-theme-cookbook/blob/master/Help/DEV.md#theme-rebuild-control-button)*
> settings[toggle_theme_rebuild] = 0


## Exclude CSS and JS
*exculde system css files and javascript files,If you need*

### Exclude javascript
exclude[javascript][] = 'sites/all/modules/field_group/field_group.js‘

### Exclude css

#### Exclude system css
```bash
exclude[css][] = 'modules/user/user.css'
exclude[css][] = 'modules/node/node.css'
exclude[css][] = 'misc/vertical-tabs.css'
exclude[css][] = 'modules/block/block.css'
exclude[css][] = 'modules/search/search.css'
exclude[css][] = 'modules/comment/comment.css'
exclude[css][] = 'modules/field/theme/field.css'
exclude[css][] = 'modules/system/system.base.css'
exclude[css][] = 'modules/system/system.menus.css'
exclude[css][] = 'modules/system/system.theme.css'
exclude[css][] = 'modules/system/system.messages.css'
```

#### Exclude modules css
```bash
exclude[css][] = 'sites/all/modules/contrib/ctools/css/modal.css'
exclude[css][] = 'sites/all/modules/flippy/flippy.css'
exclude[css][] = 'sites/all/modules/field_group/field_group.css'
exclude[css][] = 'sites/all/modules/views/css/views.css'
exclude[css][] = 'sites/all/modules/contrib/views/css/views.css'
exclude[css][] = 'sites/all/modules/ctools/css/ctools.css'
exclude[css][] = 'sites/all/modules/ctools/css/modal.css'
exclude[css][] = 'sites/all/modules/modal_forms/css/modal_forms_popup.css'
exclude[css][] = 'sites/all/modules/webform/css/webform.css'
exclude[css][] = 'sites/all/modules/date/date_api/date.css'
exclude[css][] = 'sites/all/modules/advpoll/css/advpoll.css'
exclude[css][] = 'sites/all/modules/contrib/shs/theme/shs.form.css'
exclude[css][] = 'sites/all/modules/contrib/references_dialog/css/references-dialog-admin.css'
exclude[css][] = 'sites/all/modules/views_slideshow/views_slideshow.css'
exclude[css][] = 'sites/all/modules/views_slideshow/views_slideshow_controls_text.css'
exclude[css][] = 'sites/all/modules/views_slideshow/contrib/views_slideshow_cycle/views_slideshow_cycle.css'
exclude[css][] = 'sites/all/modules/ds/layouts/ds_2col/ds_2col.css'
exclude[css][] = 'sites/all/modules/ds/layouts/ds_2col_stacked/ds_2col_stacked.css'
exclude[css][] = 'sites/all/modules/fivestar/css/fivestar.css'
```
