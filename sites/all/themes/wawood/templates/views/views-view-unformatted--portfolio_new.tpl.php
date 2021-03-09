<div class="briefcase">
    <div class="briefcase__tabs">
        <?php foreach ($view->result as $delta => $row) : ?>
            <div id="<?php echo $delta ?>" class="tab briefcase__tab-<?php echo $delta ?>  <?php echo $delta == 0 ? 'active' : '' ?>">
                <?php
                $lenguage = $row->_field_data['nid']['entity']->language;
                $title = $row->_field_data['nid']['entity']->title_field[$lenguage][0]['value'];
                $image_url = file_create_url($row->_field_data['nid']['entity']->field_image['und'][0]['uri']);
                ?>
                <?php print '<img class="briefcase__image" src="' . $image_url . '">' ?>
                <div class="briefcase__title">
                    <h2><?php echo $title ?></h2>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="briefcase__content">
        <?php $array = [] ?>
        <?php foreach ($view->result as $delta => $row) : ?>
            <div class="content briefcase__content-<?php echo $delta ?> <?php echo $delta == 0 ? 'active' : '' ?>"  data-id="<?php echo $delta ?>">
                <?php
                $lenguage = $row->_field_data['nid']['entity']->language;
                $title = $row->_field_data['nid']['entity']->title_field[$lenguage][0]['value'];
                $body = $row->_field_data['nid']['entity']->body[$lenguage][0]['value'];
                isset($row->_field_data['nid']['entity']->field_images['und'])
                    ? $images = $row->_field_data['nid']['entity']->field_images['und']
                    : $images = '';
                ?>
                <div class="briefcase__content-title">
                    <h3><?php echo $title  ?></h3>
                </div>
                <div class="briefcase__content-body">
                    <p><?php echo $body ?></p>
                </div>
                <div class="briefcase__content-images">
                    <?php
                    if (!empty($images)) {
                        foreach ($images as $image) {
                            $img_url = file_create_url($image['uri']) ?? '';
                            print '<div class="briefcase__content-image"><img src="' . $img_url . '"></div>';
                        }
                    }
                    ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>