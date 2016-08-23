* [Dev Mode]
	* [Install devel module](#install-devel-module)
	* [Custom theme settings](#custom-theme-settings)
	  * [Add rebuild theme Control button](#theme-rebuild-control-button)

### Install devel module

>  $ drush dl devel -y  
>  dpm() ...

[Developer documentation](http://ratatosk.net/drupal/tutorials/debugging-drupal.html) - Come from module developer

## Drupal javascript function
    -- Console All --
    > console.log(window.Drupal)

### EncodePath
    var url = window.location.href;
    console.log(url);
    console.log(Drupal.encodePath(url));

    -- PRINT --
    > http://localhost:81/home
    > http%3A//localhost%3A81/home


### AbsoluteUrl
    var url = window.location.href;
    console.log(url);
    console.log(Drupal.absoluteUrl().arguments);

    -- PRINT --
    > http://localhost:81/home
    > http://localhost:81/home/undefined

### CheckPlain
    var test = '<p>my</p>';
    console.log(test);
    console.log(Drupal.checkPlain(test));

    -- PRINT --
    > <p>my</p>
    > &lt;p&gt;my&lt;/p&gt;

### T
        var text = Drupal.t('All');
        console.log(text);
        console.log(Drupal.checkPlain(test));

        -- PRINT --
        localhost/cn
        > 全部
        localhost/en
        > All

## Custom theme settings
*Add drupal theme setting with myself*

### Theme Rebuild Control button

#### - theme-settings.php -
```php
/*
* hook_form_system_theme_settings_alter
*/

function themeName_form_system_theme_settings_alter(&$form, &$form_state) {
  if (isset($form_id)) {
    return;
  }

  $form['devtools'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Theme development settings'),
  );
  $form['devtools']['toggle_theme_rebuild'] = array(
    '#type' => 'checkbox',
    '#title' => t('[DEV Mode] Rebuild theme registry'),
    '#default_value' => theme_get_setting('toggle_theme_rebuild'),
    '#description' => t('Just useful on dev Mode, If Sites will online, Plase trun off this setting, Click here <a href="!link">rebuild the theme registry</a> much more information.', array('!link' => 'http://drupal.org/node/173880#theme-registry')),
  );
}

```
#### - themeName.info -
```php
/*
* 0/1 (Set default Close/Open)
*/
settings[toggle_theme_rebuild] = 0
```
#### - template.php -
```php
// Open on dev mode, auto rebuild theme code.
// Does not apply to MAINTENANCE_MODE
if (theme_get_setting('toggle_theme_rebuild') && !defined('MAINTENANCE_MODE')) {
  // Rebuild .info data.
  system_rebuild_theme_data();
  // Rebuild theme registry.
  drupal_theme_rebuild();
}
```
