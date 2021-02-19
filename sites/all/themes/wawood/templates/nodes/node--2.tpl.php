<section id="<?php print render($content['field_link']) ?>" class="the-studio text-center">
  <div class="background"></div>

  <div class="font-size-xxl text-center headline entrance" data-animation="fadeInUp">
    <?php print render($content['field_headline']) ?>
  </div>
  <div class="title"><?php print render($content['title_field']) ?></div>
  <div class="body font-size-m entrance" data-animation="fadeInUp">
    <?php print render($content['body']) ?>
  </div>
  <div class="image responsive-img entrance" data-animation="fadeInUp">
    <?php print render($content['field_image']) ?>
  </div>
  
  <div class="divisor clearfix"></div>
  
  <br>

  <div class="subhead font-size-xl entrance" data-animation="fadeInUp">
    <?php print render($content['field_subhead']) ?>
  </div>
</section>