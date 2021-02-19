<section id="<?php print render($content['field_link']) ?>" class="about-us text-center">

  <div class="title">
    <?php print render($title) ?>
  </div>

  <div class="subhead entrance" data-animation="fadeInUp">
    <?php print render($content['field_subhead']) ?>
  </div>
  
  <br>
  
  <div class="divisor"> </div>

  <div class="row text-left">
	  <div class="col-xs-12 col-sm-5">
	    <div class="image responsive-img entrance" data-animation="fadeInUp">
	      <?php print render($content['field_image']) ?>
	    </div>
	  </div>
	  <div class="col-xs-12 col-sm-7">
	    <div class="body entrance" data-animation="fadeInUp">
	      <?php print render($content['body']) ?>
	    </div>
	  </div>
	  
  </div>

</section>