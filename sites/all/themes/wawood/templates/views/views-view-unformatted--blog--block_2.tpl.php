<div class="blog-post">
    <p class="blog-post__headline"><?php print t('INSPIRING STORIES THAT INSPIRE US'); ?></p>
    <div class="blog-post__container">
        <?php foreach ($view->result as $delta => $row) : ?>
            <?php
            //url node
            $options = array('absolute' => TRUE);
            $url_node = url('node/' . $row->nid, $options);
            $lenguage = $row->_field_data['nid']['entity']->language;

            $title = '';
            $body = '';
            $image_post = '';

            if (isset($row->_field_data['nid']['entity']->title_field[$lenguage][0]['value'])) {
                $title = $row->_field_data['nid']['entity']->title_field[$lenguage][0]['value'];
            }
            if (isset($row->_field_data['nid']['entity']->body[$lenguage][0]['summary'])) {
                $body = $row->_field_data['nid']['entity']->body[$lenguage][0]['summary'];
            }
            if (isset($row->_field_data['nid']['entity']->field_imagepost['und'])) {
                $image_post = $row->_field_data['nid']['entity']->field_imagepost['und'];
            }

            ?>

            <div class="blog-post__card">
                <div class="blog-post__image">
                    <?php if (!empty($image_post[0]['uri'])) : ?>
                        <?php
                        $img_url = file_create_url($image_post[0]['uri']);
                        print '<img src="' . $img_url . '">';
                        ?>
                    <?php endif ?>
                </div>
                <div class="blog-post__content">
                    <div class="blog-post__type">
                        <?php print t('ABOUT MY JOB'); ?>
                    </div>
                    <div class="blog-post__title">
                        <?php if (!empty($title)) : ?>
                            <h3> <?php print t($title) ?></h3>
                        <?php endif ?>
                    </div>
                    <div class="blog-post__body">
                        <?php if (!empty($body)) : ?>
                            <?php
                            print $body
                            ?>
                        <?php endif ?>
                    </div>
                    <div class="blog-post__view-more">
                        <a href="<?php print $url_node; ?>"><?php print t('read more'); ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="elfsight-app-aae4dc2f-7c25-4d2c-b886-a20bad1c5c10"></div>
</div>