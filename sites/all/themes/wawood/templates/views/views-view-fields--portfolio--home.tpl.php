<?php 
global $language ;
$base_url = $GLOBALS['base_url'];
$lang_name = $language->language ;
$url = "$base_url/$lang_name/portfolio/$row->nid";
?>
<div class="work work-item" data-animation="moveLeft" data-nid="<?php print $row->nid ?>">
  <a href="<?php print $url ?>">
    <?php print $fields['field_thumbnail']->content ?>
    <div class="mask">
      <div class="label"><?php print $fields['field_headline']->content ?></div>
    </div>
  </a>
</div>