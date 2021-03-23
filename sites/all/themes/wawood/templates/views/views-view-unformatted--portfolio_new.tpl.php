<div class="briefcase">
    <div class="briefcase__tabs">
        <?php foreach ($view->result as $delta => $row) : ?>
            <div id="<?php echo $delta ?>" class="tab briefcase__tab-<?php echo $delta ?>  <?php echo $delta == 0 ? 'active' : '' ?>">
                <?php
                global $language;
                $lang_name = $language->language ;
                $title = $row->node_title ;
                $image_url = file_create_url($row->field_field_image[0]['raw']['uri']);
                ?>
                <?php print '<img class="briefcase__image" src="' . $image_url . '">' ?>
                <div class="briefcase__title">
                    <h2><?php echo t($title) ?></h2>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="briefcase__content">
        <?php $array = [] ?>
        <?php foreach ($view->result as $delta => $row) : ?>
            <div class="content briefcase__content-<?php echo $delta ?> <?php echo $delta == 0 ? 'active' : '' ?>"  data-id="<?php echo $delta ?>">
                <?php
                $title = $row->node_title;
                $body = $row->field_body[0]['raw']['value'];
                isset($row->field_field_images)
                    ? $images = $row->field_field_images
                    : $images = '';
                ?>
                <div class="briefcase__content-title">
                    <h3><?php echo t($title)  ?></h3>
                </div>
                <div class="briefcase__content-body">
                    <p><?php echo $body ?></p>
                </div>
                <div class="briefcase__content-images">
                    <?php
                    if (!empty($images)) {
                        foreach ($images as $image) {
                            $img_url = file_create_url($image['uri']);
                            print '<div class="briefcase__content-image"><img src="' . $img_url . '"></div>';
                        }
                    }
                    ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>