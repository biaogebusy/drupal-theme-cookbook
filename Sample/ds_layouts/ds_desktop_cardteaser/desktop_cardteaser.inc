<?php
function ds_desktop_cardteaser() {
  return array(
    'label' => t('Desktop View Crad Teaser'),
    'regions' => array(
      'image' => t('Image'),
      'time' => t('Time'),
      'morebutton' => t('More Button'),
      'summary' => t('Summary'),
    ),
    // Add this line if there is a default css file.
    'css' => FALSE,
    // Add this line if you're using DS 2.x for icon preview
    'image' => TRUE,
  );
}
?>
