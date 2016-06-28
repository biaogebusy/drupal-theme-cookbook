<?php
/**
 * @see https://api.drupal.org/api/drupal/modules!system!page.tpl.php/7.x
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 */
?>

<div id="page-wrapper"><div id="page">

<div id="header"><div class="section clearfix">

  <?php if ($site_name || $site_slogan): ?>
    <div id="name-and-slogan">
      <?php if ($site_name): ?>
        <?php if ($title): ?>
          <div id="site-name"><a href="<?php print url('manage'); ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a></div>
        <?php else: /* Use h1 when the content title is empty */ ?>
          <h1 id="site-name">
            <a href="<?php print url('manage'); ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
          </h1>
        <?php endif; ?>
      <?php endif; ?>
      <?php print $breadcrumb; ?>
      <?php if ($site_slogan): ?>
        <div id="site-slogan"><?php print $site_slogan; ?></div>
      <?php endif; ?>
    </div> <!-- /#name-and-slogan -->
  <?php endif; ?>

  <?php print render($page['header']); ?>

  <?php print theme('links__system_secondary_menu', array(
    'links' => $secondary_menu,
    'attributes' => array(
      'id' => 'manage-menu',
      'class' => array('links', 'clearfix')
    ),
    'heading' => ''
  )); ?>

</div></div> <!-- /.section, /#header -->

<?php if ($main_menu || $secondary_menu): ?>
  <div id="navigation"><div class="section">
    <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu',
            'class' => array('links', 'inline', 'clearfix')),
            'heading' => ''
    ));?>
  </div></div> <!-- /.section, /#navigation -->
<?php endif; ?>

<div id="main-wrapper"><div id="main" class="clearfix">

  <div id="content" class="column"><div class="section">
    <a id="main-content"></a>

    <?php if ($page['highlighted']): ?>
      <div id="highlighted">
        <?php print render($page['highlighted']); ?>
      </div>
    <?php endif; ?>

    <?php print render($title_prefix); ?>
    <?php if ($title || $action_links): ?>
      <div class="title clearfix" id="page-title">
        <?php if ($action_links): ?>
          <ul class="action-links">
            <?php print render($action_links); ?>
          </ul>
        <?php endif; ?>
        <?php if ($title): ?>
          <h1 class="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ($tabs): ?>
      <div class="tabs">
        <?php print render($tabs); ?>
      </div>
    <?php endif; ?>

    <?php print $messages; ?>
    <?php print render($page['help']); ?>

    <?php print render($page['content']); ?>

    <?php print $feed_icons; ?>
  </div></div> <!-- /.section, /#content -->

  <?php if ($page['sidebar_first']): ?>
    <div id="sidebar-first" class="column sidebar"><div class="section">
      <?php print render($page['sidebar_first']); ?>
    </div></div> <!-- /.section, /#sidebar-first -->
  <?php endif; ?>

  <?php if ($page['sidebar_second']): ?>
    <div id="sidebar-second" class="column sidebar"><div class="section">
      <?php print render($page['sidebar_second']); ?>
    </div></div> <!-- /.section, /#sidebar-second -->
  <?php endif; ?>

</div></div> <!-- /#main, /#main-wrapper -->


</div></div> <!-- /#page, /#page-wrapper -->

<?php if ($page['outside']): ?>
  <div id="outside">
    <?php if ($logo): ?>
      <a href="<?php print url('manage'); ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>
    <div class="section">
      <?php print render($page['outside']); ?>
    </div>
    <div id="footer">
      <?php print render($page['footer']); ?>
    </div> <!-- /.section, /#footer -->
  </div>
<?php endif; ?>

<div id="modals">
  <div class="modal fade" id="modal-loading">
    <div class="loading"></div>
  </div>
  <?php print render($page['modals']); ?>
</div>


