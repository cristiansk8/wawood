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
            $lenguage = $GLOBALS['language']->language;

            $title = '';
            $image_post = '';

            if (isset($row->_field_data['nid']['entity']->title_field[$lenguage][0]['value'])) {
                $title = $row->_field_data['nid']['entity']->title_field[$lenguage][0]['value'];
            }
            if (isset($row->_field_data['nid']['entity']->field_imagepost['und'])) {
                $image_post = $row->_field_data['nid']['entity']->field_imagepost['und'];
            }

            ?>
            <?php if ($nid !==  $row->nid) : ?>
                <div class="blog-more__card">
                    <div class="blog-more__image">
                        <?php if (!empty($image_post[0]['uri'])) : ?>
                            <?php
                            $img_url = file_create_url($image_post[0]['uri']);
                            print '<a href="'.$url_node.'"><img src="' . $img_url . '"></a>';
                            ?>
                        <?php endif ?>
                    </div>
                    <div class="blog-more__title">
                        <?php if (!empty($title)) : ?>
                            <a href="<?php print $url_node ?>">
                            <h3> <?php print t($title) ?></h3>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>