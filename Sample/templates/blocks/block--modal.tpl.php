<?php
/**
 * @file
 * Returns the HTML for a block.
 *
 */
?>
<div id="<?php print $block_html_id; ?>" class="modal fade <?php print $classes; ?>" <?php print $attributes; ?>>
  <div class="modal-dialog">
    <div class="modal-content">
		  <?php print render($title_prefix); ?>
		  <?php if ($title): ?>
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 <?php print $title_attributes; ?> class="modal-title <?php print $classes; ?>"><?php print $title; ?></h4>
	      </div>
			<?php endif; ?>
			<?php print render($title_suffix); ?>
      <div class="modal-body">
        <?php print $content; ?>
      </div>
    </div>
  </div>
</div>