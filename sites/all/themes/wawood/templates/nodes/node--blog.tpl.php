<?php

/**
 * @file
 * Bartik's theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix" <?php print $attributes; ?>>

    <?php print render($title_prefix); ?>
    <?php if (!$page) : ?>
        <h2<?php print $title_attributes; ?>>
            <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
            </h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <div class="blog-page content clearfix" <?php print $content_attributes; ?>>
            <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            $lenguage = $GLOBALS['language']->language;

            $images_node = '';
            $title_node = '';
            $body = '';
            $images_post = '';

            if (isset($node->field_images_slider['und'])) {
                $images_node = $node->field_images_slider['und'];
            }
            if (isset($node->title)) {
                $title_node = $node->title;
            }

            if (isset($node->body[$lenguage][0]['value'])) {
                $body = $node->body[$lenguage][0]['value'];
            }

            if (isset($node->field_images_post['und'])) {
                $images_post = $node->field_images_post['und'];
            }

            ?>
            <div class="blog-page__wrapper">
                <?php if (!empty($images_node)) : ?>
                    <button type="button" class="slick-prev slick-arrow"><?php print 'Prev' ?></button>
                    <div class="blog-page__slider">
                        <?php foreach ($images_node as $image) : ?>
                            <div class="blog-page__slide">
                                <?php
                                $img_url = file_create_url($image['uri']);
                                print '<img src="' . $img_url . '">';
                                ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <button type="button" class="slick-next slick-arrow"><?php print 'Next' ?></button>
                <?php endif ?>
            </div>
            <div class="blog-page__content">
                <div class="blog-page__type">
                    <?php print t('ABOUT MY JOB'); ?>
                </div>
                <div class="blog-page__title">
                    <?php if (!empty($title_node)) : ?>
                        <h1><?php print t($title_node)  ?></h1>
                    <?php endif ?>
                </div>
                <div class="blog-page__body">
                    <?php if (!empty($body)) : ?>
                        <?php print $body; ?>
                    <?php endif ?>
                </div>
                <div class="blog-page__post-images">
                    <?php if (!empty($images_post)) : ?>
                        <?php foreach ($images_post as $image) : ?>
                            <div class="blog-page__image">
                                <?php
                                $img_url = file_create_url($image['uri']);
                                print '<img src="' . $img_url . '">';
                                ?>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <?php
        // Remove the "Add new comment" link on the teaser page or if the comment
        // form is being displayed on the same page.
        if ($teaser || !empty($content['comments']['comment_form'])) {
            unset($content['links']['comment']['#links']['comment-add']);
        }
        // Only display the wrapper div if there are links.
        $links = render($content['links']);
        if ($links) :
        ?>
            <div class="link-wrapper">
                <?php print $links; ?>
            </div>
        <?php endif; ?>
</div>


<?php
print views_embed_view('blog', 'block_3');
?>


<div class="comments-blog">
    <?php print render($content['comments']); ?>
</div>

<div class="elfsight-app-aae4dc2f-7c25-4d2c-b886-a20bad1c5c10"></div>