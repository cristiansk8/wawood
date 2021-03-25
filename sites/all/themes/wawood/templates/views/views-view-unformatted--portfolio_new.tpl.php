<div class="briefcase">
    <div class="briefcase__tabs">
        <?php foreach ($view->result as $delta => $row) : ?>
            <div id="<?php echo $delta ?>" class="tab briefcase__tab-<?php echo $delta ?>  <?php echo $delta == 0 ? 'active' : '' ?>">
                <?php
                global $language;
                $lang_name = $language->language;
                $title = '';
                $image_url = '';

                if (isset($row->node_field_data_field_portfolio_title)) {
                    $title = $row->node_field_data_field_portfolio_title;
                }

                if (isset($row->field_field_image[0]['raw']['uri'])) {
                    $image_url = file_create_url($row->field_field_image[0]['raw']['uri']);
                }

                ?>
                <?php if (!empty($image_url)) : ?>
                    <?php print '<img class="briefcase__image" src="' . $image_url . '">' ?>
                <?php endif ?>
                <div class="briefcase__title">
                    <h2><?php echo t($title) ?></h2>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="briefcase__content">
        <?php $array = [] ?>
        <?php foreach ($view->result as $delta => $row) : ?>
            <div class="content briefcase__content-<?php echo $delta ?> <?php echo $delta == 0 ? 'active' : '' ?>" data-id="<?php echo $delta ?>">
                <?php
                $title = '';
                $body = '';

                if (isset($row->node_field_data_field_portfolio_title)) {
                    $title = $row->node_field_data_field_portfolio_title;
                }

                if (isset($row->field_body[0]['raw']['value'])) {
                    $body = $row->field_body[0]['raw']['value'];
                }

                isset($row->field_field_images)
                    ? $images = $row->field_field_images
                    : $images = '';
                ?>
                <div class="briefcase__content-title">
                    <?php if (!empty($title)) : ?>
                        <h3><?php echo t($title)  ?></h3>
                </div>
            <?php endif ?>
            <div class="briefcase__content-body">
                <?php if (!empty($title)) : ?>
                    <p><?php echo $body ?></p>
                <?php endif ?>
            </div>
            <div class="briefcase__content-images">
                <?php
                if (!empty($images)) {
                    foreach ($images as $image) {
                        if (!empty($image['raw']['uri'])) {
                            $img_url = file_create_url($image['raw']['uri']);
                            print '<div class="briefcase__content-image"><img src="' . $img_url . '"></div>';
                        }
                    }
                }
                ?>
            </div>
            </div>
        <?php endforeach ?>
    </div>
</div>