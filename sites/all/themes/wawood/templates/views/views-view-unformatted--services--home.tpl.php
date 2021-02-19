<div id="carousel-services" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php foreach($view->result as $delta => $row): ?>
    <div class="fullwidth-img item<?php print $row->nid == $GLOBALS['active_nid'] ? ' active' : '' ?>">
      <?php print $rows[$delta] ?>
    </div>
    <?php endforeach ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-services" role="button" data-slide="prev">
    <span class="fa angle-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-services" role="button" data-slide="next">
    <span class="fa angle-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
