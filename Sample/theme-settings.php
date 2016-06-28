<?php

function wenui_form_system_theme_settings_alter(&$form, &$form_state) {
  if (isset($form_id)) {
    return;
  }

  $form['devtools'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Theme development settings'),
  );
  // Add a Theme
  $form['devtools']['toggle_theme_rebuild'] = array(
    '#type' => 'checkbox',
    '#title' => t('[DEV Mode] Rebuild theme registry'),
    '#default_value' => theme_get_setting('toggle_theme_rebuild'),
    '#description' => t('Just useful on dev Mode, If Sites will online, Plase trun off this setting, Click here <a href="!link">rebuild the theme registry</a> much more information.', array('!link' => 'http://drupal.org/node/173880#theme-registry')),
  );
}