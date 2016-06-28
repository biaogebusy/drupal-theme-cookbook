<<?php print $layout_wrapper; print $layout_attributes; ?> class="clearfix view-card-teaser<?php print $classes;?>">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <?php if ($image): ?>
    <<?php print $image_wrapper ?> class="view-card-img <?php print $image_classes; ?>">
      <?php print $image; ?>
      <?php print $uititle; ?>
    </<?php print $image_wrapper ?>>
  <?php endif; ?>

  <?php if ($time): ?>
    <<?php print $time_wrapper ?> class="view-card-time <?php print $time_classes; ?>">
      <?php print $time; ?>
    </<?php print $time_wrapper ?>>
  <?php endif; ?>

  <?php if ($morebutton): ?>
    <<?php print $morebutton_wrapper ?> class="view-card-morebutton <?php print $morebutton_classes; ?>">
      <?php print $morebutton; ?>
    </<?php print $morebutton_wrapper ?>>
  <?php endif; ?>

  <?php if ($summary): ?>
    <<?php print $summary_wrapper ?> class="view-card-summary <?php print $summary_classes; ?>">
      <?php print $summary; ?>
    </<?php print $summary_wrapper ?>>
  <?php endif; ?>

</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>