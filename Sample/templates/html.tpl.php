<?php
/**
 * @see https://api.drupal.org/api/drupal/modules!system!html.tpl.php/7.x
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?><!DOCTYPE html>
<!--[if IE 8]><html class="lt-ie9 ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 9]><html class="lt-ie10 ie9" <?php print $html_attributes; ?>><![endif]-->
<head profile="<?php print $grddl_profile; ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />
  <meta http-equiv="cleartype" content="on">
  <?php print $head; ?>

  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="viewport" content="width=device-width">

  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <!--[if lt IE 10]>
    <style type="text/css" media="all">
      @import url(" <?php print $theme_path; ?>/css/ie.css");
    </style>
  <![endif]-->
  <?php print $scripts; ?>

</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>