<section id="<?php print render($content['field_link']) ?>" class="services text-center">

	<div class="title">
		<?php print render($title) ?>
	</div>
	<div class="body entrance" data-animation="fadeInUp">
		<?php print render($content['body']) ?>
	</div>
	
	<div class="services-list row responsive-img">
		<?php foreach($services as $service): ?>
		<div class="col-xs-12 col-sm-4">
			 <div class="service">
				<div class="image responsive-img">
					<?php print render($service['field_image']) ?>
				</div>
				<h2 class="font-size-m uppercase font-bold color-blue-wawood"><?php print render($service['#node']->title) ?></h2>
				<div class="text text-left">
					<?php print render($service['body']) ?>
				</div>
			 </div>
		</div>
		<?php endforeach ?>
	</div>
	
	<div class="subhead entrance" data-animation="fadeInUp">
		<?php print render($content['field_subhead']) ?>
	</div>
</section>
