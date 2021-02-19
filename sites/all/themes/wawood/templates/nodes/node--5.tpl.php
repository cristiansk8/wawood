<section id="<?php print render($content['field_link']) ?>" class="contact text-center">
	
	<div class="responsive-img logo">
	  <?php print render($content['field_image']) ?>
	</div>

  <div class="headline entrance" data-animation="fadeInUp">
    <?php print render($content['field_headline']) ?>
  </div>
  
  <div class="bg-gray-8">
	
	  <div class="body entrance" data-animation="fadeInUp">
	    <?php print render($content['body']) ?>
	  </div>
	  
	  <div class="row section-divisor"></div>
	
	  <div class="subhead entrance" data-animation="fadeInUp">
	    <?php print render($content['field_subhead']) ?>
	  </div>
    
  </div>

  <div class="form">
    <form name="contact" class="text-left font-raleway" method="post">
      <label><div class="label"><?php print t('Name') ?>*</div><input name="Name" type="text" required></label>
      <label><div class="label">Email*</div><input type="text" name="Email" required></label>
      <label><div class="label"><?php print t('Subject') ?></div><input name="Subject" type="text"></label>
      <label><div class="label"><?php print t('Message') ?>*</div><textarea name="Message" required></textarea></label>
      <div class="contact-messages"></div>
      <div class="actions">
        <input class="submit" type="submit" value="<?php print t('Submit') ?>">
      </div>
    </form>
  </div>

</section>