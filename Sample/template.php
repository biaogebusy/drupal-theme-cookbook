<?php

// Theme Defualt hook
$theme_path = drupal_get_path('theme', 'wenui');

// Include File
require_once $theme_path . '/includes/theme.inc';
require_once $theme_path . '/includes/system.inc';

// Open on dev mode, auto rebuild theme code.
if (theme_get_setting('toggle_theme_rebuild') && !defined('MAINTENANCE_MODE')) {
  // Rebuild .info data.
  system_rebuild_theme_data();
  // Rebuild theme registry.
  drupal_theme_rebuild();
}

function wenui_preprocess_html(&$variables, $hook) {

  $variables['theme_path'] = base_path() . drupal_get_path('theme', 'wenui');

  drupal_add_js(array(
    'wenui' => array(
      'path' => $variables['theme_path']
    )
  ), 'setting');

  // Attributes for html element.
  $variables['html_attributes_array'] = array(
    'lang' => $variables['language']->language,
    'dir' => $variables['language']->dir,
  );

}

/**
 * hook_preprocess_page.
 */
function wenui_preprocess_page(&$variables, $hook) {

  if($variables['is_front']){
    unset($variables['page']['content']['system_main']['default_message']);
  }


  // 判断登录
  // if(user_is_logged_in()){
  // }

  // 增加标题
  // if(preg_match('/^manage\/user/', current_path())) {
  //   $variables['title'] = '用户管理';
  // }

   // 隐藏
   // $pages_exclude_tab = array();
   // if (arg(0) == 'manage' && in_array(arg(2), array('add', 'edit'))) {
   //   $variables['tabs']['#primary'] = array();
   // }

}


function wenui_preprocess_block(&$variables, $hook) {
  //dpm($variables);
}
