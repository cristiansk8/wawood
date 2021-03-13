<div class="blog-post">
    <div class="blog-post__container">
        <?php foreach ($view->result as $delta => $row) : ?>
            <?php
            //url node
            $options = array('absolute' => TRUE);
            $url_node = url('node/' . $row->nid, $options);

            $lenguage = $row->_field_data['nid']['entity']->language;
            $title = $row->_field_data['nid']['entity']->title_field[$lenguage][0]['value'];
            $body = $row->_field_data['nid']['entity']->body[$lenguage][0]['value'];
            $image_post = $row->_field_data['nid']['entity']->field_imagepost['und'];
            ?>
            <div class="blog-post__card">
                <div class="blog-post__image">
                    <?php
                    $img_url = file_create_url($image_post[0]['uri']);
                    print '<img src="' . $img_url . '">';
                    ?>
                </div>
                <div class="blog-post__content">
                    <div class="blog-post__title">
                        <h3> <?php print $title   ?></h3>
                    </div>
                    <div class="blog-post__body">
                        <?php print $body  ?>
                    </div>
                    <div class="blog-post__view-more">
                        <a href="<?php print $url_node; ?>"><?php  print t('read more'); ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>