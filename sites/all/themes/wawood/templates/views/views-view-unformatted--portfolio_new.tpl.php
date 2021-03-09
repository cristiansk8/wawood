<div class="briefcase">
    <div class="briefcase__tabs">
        <?php foreach ($view->result as $delta => $row) : ?>
            <div id="<?php echo $delta ?>" class="briefcase__tab-<?php echo $delta ?>">
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
        <?php foreach ($view->result as $delta => $row) : ?>
            <div class="briefcase__content-<?php echo $delta ?>" data-id="<?php echo $delta ?>">
                <?php
                $lenguage = $row->_field_data['nid']['entity']->language;
                $title = $row->_field_data['nid']['entity']->title_field[$lenguage][0]['value'];
                $body = $row->_field_data['nid']['entity']->body[$lenguage][0]['value'];
                ?>
                <div class="briefcase__content-title">
                    <h3><?php echo $title  ?></h3>
                </div>
                <div class="briefcase__body">
                    <p><?php echo $body ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>