<?php 
$options = array('absolute' => TRUE);
$url_node = url('node/' . $row->nid, $options);
?>
<div class="work work-item" data-animation="moveLeft" data-nid="<?php print $row->nid ?>">
  <a href="<?php print $url_node ?>">
    <?php print $fields['field_thumbnail']->content ?>
    <div class="mask">
      <div class="label"><?php print $fields['field_headline']->content ?></div>
    </div>
  </a>
</div>