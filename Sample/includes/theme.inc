<?php

/*
 * Get theme info
 */

function wenui_get_theme_info($theme_key = NULL, $key = NULL, $base_themes = TRUE) {
  // If no $theme_key is given, use the current theme if we can determine it.
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
            $value = wenui_get_theme_info($base_theme, $key);
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

/*
 * Js alert unset drupal system js.
 */

function wenui_js_alter(&$javascript){
  $excludes = wenui_get_theme_info(NULL, 'exclude][javascript');
  if (!empty($excludes)) {
    $javascript = array_diff_key($javascript, drupal_map_assoc($excludes));
  }
}

/*
 * Css alert unset drupal system css.
 */

function wenui_css_alter(&$css){
  $excludes = wenui_get_theme_info(NULL, 'exclude][css');
  if (!empty($excludes)) {
    $css = array_diff_key($css, drupal_map_assoc($excludes));
  }
}

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function wenui_process_html(&$variables, $hook) {
  // Flatten out html_attributes.
  $variables['html_attributes'] = drupal_attributes($variables['html_attributes_array']);
}


/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function wenui_process_block(&$variables, $hook) {

  // $title variable instead of $block->subject.
  $variables['title'] = $variables['block']->subject;

}

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function wenui_process_node(&$variables, $hook) {
  // Add $unpublished variable.
  $variables['unpublished'] = (!$variables['status']) ? TRUE : FALSE;
}


/**
 * Reset item list layout with this theme
 * hook_item_list
 */
function wenui_item_list(&$variables) {
  $items = $variables['items'];
  $title = $variables['title'];
  $type = $variables['type'];
  $attributes = $variables['attributes'];

  $output = '';
  if (isset($title) && $title !== '') {
    $output .= '<h3>' . $title . '</h3>';
  }

  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    $num_items = count($items);
    $i = 0;
    foreach ($items as $item) {
      $attributes = array();
      $children = array();
      $data = '';
      $i++;
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          } elseif ($key == 'children') {
            $children = $value;
          } else {
            $attributes[$key] = $value;
          }
        }
      } else {
        $data = $item;
      }
      if (count($children) > 0) {
        // Render nested list.
        $data .= theme_item_list(array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
      }
      if ($i == 1) {
        $attributes['class'][] = 'first';
      }
      if ($i == $num_items) {
        $attributes['class'][] = 'last';
      }
      $output .= '<li' . drupal_attributes($attributes) . '>' . $data . "</li>\n";
    }
    $output .= "</$type>";
  }
  return $output;
}

/*
 * Returns HTML for status and/or error messages, grouped by type.
 */
function wenui_status_messages($variables){
  $display = $variables['display'];
  $output = '';
  $status_heading = array(
    'status' => t('Status'),
    'error' => t('Error'),
    'warning' => t('Warning'),
  );
  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"alert messages $type\">\n";
    $output .= "<a class=\"a_close\" data-dismiss=\"alert\" href=\"#\">&times;</a>\n";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  return $output;
}



/**
 * Override theme_breadrumb().
 *
 */
function wenui_breadcrumb($variables) {
  $show_breadcrumb = theme_get_setting('zkf_breadcrumb');
  $breadcrumb = $variables['breadcrumb'];
  $output = '';
  if($breadcrumb[0]){
    unset($breadcrumb[0]);
  }

//  if ($show_breadcrumb == 'yes' || $show_breadcrumb == 'admin' && arg(0) == 'admin') {
    //list page
    if(preg_match('/taxonomy\/term\/(.*?)(\d*)$/', current_path(), $match)) {
      $tid = array_pop($match);
      $term = taxonomy_term_load($tid);
      drupal_set_title($term->name);
    }
    //detail page
    if(arg(0) == 'user') {
        $breadcrumb = array();
    }
    //set views index title
    if(preg_match("/taxonomy\/term\/all\/\d*/", current_path())) {
      $breadcrumb = array();
    }
    if (!empty($breadcrumb)) {
      $output = '<ul class="breadcrumb list inline">';

      $count = count($breadcrumb) - 1;
      foreach ($breadcrumb as $key => $value) {
        if ($count != $key) {
          $output .= '/<li>' . $value . '</li>';
        }
        else{
          $output .= '/<li>' . $value . '</li>';
        }
      }
      $output .= '</ul>';
    }
//  }
  return $output;
}



