* [Tempalte Settings and hook](#template-setting-and-hook)
  * [Get theme path](#get-theme-path)
  * [Include files](#include-files)
  * [Get theme info function](#get-theme-info)
  * [Unset drupal system or modules Js](#unset-drupal-js) - *Must be required [Get Info Function](#get-theme-info)*
  * [Unset drupal system or modules CSS](#unset-drupal-css) - *Must be required [Get Info Function](#get-theme-info)*
  * [Override Drupal Default Print](#override-drupal-default-print)
  * [Hide/Change First Time With Front Page](#hook-first-time-message)
  * [Region template by UI](#region-template-by-ui)
  * [Block template by UI](#block-template-by-ui)

## Template Setting and Hook
*hook system template print and add custom print*

### Get theme path
> $theme_path = drupal_get_path('theme', 'themeName');

### Include files
> require_once $theme_path . '/override/theme.inc';  

### Get theme info function
*[! This function From drupal-bootstrap.org](http://drupal-bootstrap.org/api/bootstrap/includes%21common.inc/function/bootstrap_get_theme_info/7)*

```php
function get_theme_info($theme_key = NULL, $key = NULL, $base_themes = TRUE) {
  if (!isset($theme_key)) {
    $theme_key = !empty($GLOBALS['theme_key']) ? $GLOBALS['theme_key'] : FALSE;
  }
  if ($theme_key) {
    $themes = list_themes();
    if (!empty($themes[$theme_key])) {
      $theme = $themes[$theme_key];
      if ($key) {
        $value = FALSE;
        if ($base_themes && isset($theme->base_themes)) {
          foreach (array_keys($theme->base_themes) as $base_theme) {
            $value = bootstrap_get_theme_info($base_theme, $key);
          }
        }
        if (!empty($themes[$theme_key])) {
          $info = $themes[$theme_key]->info;
          $keys = explode('][', $key);
          foreach ($keys as $parent) {
            if (isset($info[$parent])) {
              $info = $info[$parent];
            }
            else {
              $info = FALSE;
            }
          }
          if (is_array($value)) {
            if (!empty($info)) {
              if (!is_array($info)) {
                $info = array($info);
              }
              $value = drupal_array_merge_deep($value, $info);
            }
          }
          else {
            if (!empty($info)) {
              if (empty($value)) {
                $value = $info;
              }
              else {
                if (!is_array($value)) {
                  $value = array($value);
                }
                if (!is_array($info)) {
                  $info = array($info);
                }
                $value = drupal_array_merge_deep($value, $info);
              }
            }
          }
        }
        return $value;
      }
      return $theme->info;
    }
  }
  return FALSE;
}
```

### Unset drupal Js

#### Function
```php
function themeName_js_alter(&$javascript){
  $excludes = get_theme_info(NULL, 'exclude][javascript');
  if (!empty($excludes)) {
    $javascript = array_diff_key($javascript, drupal_map_assoc($excludes));
  }
}
```
#### .info
  * [Exclude javascript](https://github.com/wenroo/drupal-theme-cookbook/blob/master/Help/INFO.md#exclude-javascript)


### Unset drupal Css

#### Function
```php
function themeName_css_alter(&$css){
  $excludes = get_theme_info(NULL, 'exclude][css');
  if (!empty($excludes)) {
    $css = array_diff_key($css, drupal_map_assoc($excludes));
  }
}
```
#### .info
* [Exclude css](https://github.com/wenroo/drupal-theme-cookbook/blob/master/Help/INFO.md#exclude-css)
  * [Exclude system css](https://github.com/wenroo/drupal-theme-cookbook/blob/master/Help/INFO.md#exclude-system-css)
  * [Exclude modules css](https://github.com/wenroo/drupal-theme-cookbook/blob/master/Help/INFO.md#exclude-modules-css)


### Override Drupal Default Print
*override drupal system function with this theme*
FX.
```PHP
function themeName_item_list($variables) {
... Copy theme_item_list function here and change it ...
}
```
* [theme_item_list](https://api.drupal.org/api/drupal/includes%21theme.inc/function/theme_item_list/7.x)
* [theme_status_messages](https://api.drupal.org/api/drupal/includes%21theme.inc/function/theme_status_messages/7.x)
* [theme_breadcrumb](https://api.drupal.org/api/drupal/includes%21theme.inc/function/theme_breadcrumb/7.x)
* [Others](https://api.drupal.org/api/drupal/7.x/search/theme_)

### Hook first time Message
*remove 'No front page content has been created yet.' Display*
```php
function themeName_preprocess_page(&$variables, $hook) {

  if($variables['is_front']){
    // Remove
    unset($variables['page']['content']['system_main']['default_message']);
    // Change
    //$variables['page']['content']['system_main']['default_message'] = 'Welcome!'
  }

}
```

### Region template by UI
```php
function themeName_preprocess_region(&$variables, $hook) {
  // Change region template.
	$grid_wrapper = array(
    'header',
    'footer'
  );
  if (in_array($variables['region'], $grid_wrapper)){
    $variables['theme_hook_suggestions'][] = 'region__grid';
    // region--grid.tpl.php
  }
}
```

### Block template by UI
```php
function themeName_preprocess_block(&$variables, $hook) {
  $panel = array(
    'block-1',
    'block-2',
  );
  $modal = array(
    'block-3',
    'block-4',
  );
  if (in_array($variables['block_html_id'], $panel)){
    $variables['theme_hook_suggestions'][] = 'block__panel';
    // block--panel.tpl.php
  }
  if (in_array($variables['block_html_id'], $modal)){
    $variables['theme_hook_suggestions'][] = 'block__modal';
    // block--modal.tpl.php
  }
}
```
