  <div id="page-wrapper"><div id="page" class="container">
    
    <header>

      <nav id="main-nav" class="hidden-xs hidden-sm">
        <div class="menu-bar font-size-xs color-gray-3">
          <a class="logo" href="<?php print base_path() ?>#home"><?php print $logo_header_lg ?></a>
          <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('clean', 'horizontal', 'clearfix', 'clean-a')))); ?>
          <?php print render($page['lang_switcher']) ?>
        </div>
      </nav>

      <nav id="main-nav-mobile" class="visible-xs visible-sm">
        <div class="nav-bar text-right">
          <button class="btn-primary" type="button" data-toggle="collapse" data-target="#mobile-menu-wrapper" aria-expanded="true">
            <div class="menu--mobile--btn">
              <div></div>
              <div></div>
            </div>
          </button>
          <?php print render($page['lang_switcher']) ?>
          <div class="collapse" id="mobile-menu-wrapper" aria-expanded="true" style="">
            <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu-mobile', 'class' => array('clean', 'clean-a')))); ?>
          </div>
        </div>
      </nav>
  
    </header>

    <div class="social-net-container">
      <div class="social-net sprites">
        <a href="mailto:<?php print variable_get('site_mail') ?>"><span class="sprite mail"></span></a>
      <?php  foreach(array('pinterest', 'instagram', 'linkedin', 'audio') as $net): 
                if($url = variable_get($net, '')): ?>
        <a href="<?php print $url ?>" target="_blank"><span class="sprite <?php print $net ?>"></span></a>
      <?php endif; endforeach; ?>
      </div>
    </div>

    <?php print $messages; ?>

      <div id="content" class="column">
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div> <!-- /.section, /#content -->


    <footer class="text-center">
      <div class="copyright font-raleway"><?php print t(variable_get('copyright')); ?></div>
    </footer>

  </div></div>