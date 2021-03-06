<div class="banner-home">
    <div class="banner-home__container">
        <?php foreach ($view->result as $delta => $row) : ?>
            <div class="banner-home__slide">
                <?php $url_file = file_create_url($row->_field_data['nid']['entity']->field_banner_image_['und'][0]['uri']) ?>
                <?php print '<img class="banner-home__image" src="'.$url_file.'">' ?>
            </div>
        </pre>
        <?php endforeach ?>
    </div>
</div>


