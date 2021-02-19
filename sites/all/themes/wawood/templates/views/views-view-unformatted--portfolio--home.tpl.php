<section id="portfolio" class="entrance" data-animation="work-animated" style="opacity:1">
  <div class="title text-center uppercase"><?php echo t('Portfolio') ?></div>
  <div id="work-window"></div>
  <div class="work-list">
    <div class=""></div>
    <?php foreach($rows as $row) print $row ?>
  </div>
  
  <img class="logo" src="<?php print base_path() . path_to_theme() ?>/img/logo-portfolio.jpg">
	

</section>

<div class="text-center row">
  	<div class="section-divisor"></div>
</div>

