<?php
/**
 * @file
 * Returns the HTML for a block.
 *
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>" <?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?> class="block-title <?php print $classes; ?>"><?php print $title; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php print $content; ?>
</div>