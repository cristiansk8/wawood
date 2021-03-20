<?php
if (arg(0) == 'node' && is_numeric(arg(1))) {
    $nid = arg(1);
}
?>
<div class="blog-more">
    <p class="blog-more__headline"><?php print t('MORE POSTS'); ?></p>
    <div class="blog-more__container">
        <?php foreach ($view->result as $delta => $row) : ?>
            <?php
            //url node
            $options = array('absolute' => TRUE);
            $url_node = url('node/' . $row->nid, $options);

            $lenguage = $row->_field_data['nid']['entity']->language;
            $title = $row->_field_data['nid']['entity']->title_field[$lenguage][0]['value'] ?? '';
            $image_post = $row->_field_data['nid']['entity']->field_imagepost['und'];

            ?>
            <?php if ($nid !==  $row->nid) : ?>
                <div class="blog-more__card">
                    <div class="blog-more__image">
                        <?php
                        $img_url = file_create_url($image_post[0]['uri']);
                        print '<img src="' . $img_url . '">';
                        ?>
                    </div>
                    <div class="blog-more__title">
                        <?php if (!empty($title)) : ?>
                            <h3> <?php print t($title) ?></h3>
                    </div>
                <?php endif ?>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>