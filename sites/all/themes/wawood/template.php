<?php
function wawood_preprocess_html(&$vars)
{
  $node = node_load(17);
  $title = field_get_items('node', $node, 'field_subhead');
  $image = field_get_items('node', $node, 'field_image');
  $description = field_get_items('node', $node, 'body');

  $og_data = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'property' =>  'og:title',
      'content' => strip_tags($title[0]['safe_value']),
    )
  );

  drupal_add_html_head($og_data, 'og_title');

  $og_data = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'property' =>  'og:description',
      'content' => strip_tags($description[0]['safe_value']),
    )
  );

  drupal_add_html_head($og_data, 'og_description');

  $image_uri      = $image[0]['uri'];
  $style          = 'og_image';
  $derivative_uri = image_style_path($style, $image_uri);
  $success        = file_exists($derivative_uri) || image_style_create_derivative(image_style_load($style), $image_uri, $derivative_uri);

  $og_data = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'property' =>  'og:image',
      'content' => file_create_url($derivative_uri, array('absolute' => true)),
    )
  );

  drupal_add_html_head($og_data, 'og_image');

  $options = array(
    'type' => 'external',
    'defer' => TRUE,
  );

  drupal_add_js('https://apps.elfsight.com/p/platform.js', $options);
  
}

function wawood_preprocess_page(&$vars)
{
  $theme_path = base_path() . path_to_theme() . '/';

  //  $vars['logo_header_sm'] = _wawood_create_image_tag($theme_path . 'img/logo-header-sm.png');
  $vars['logo_header_lg'] = _wawood_create_image_tag($theme_path . 'img/logo-header-lg.png');
  $vars['logo_footer'] = _wawood_create_image_tag($theme_path . 'img/logo-footer.png');

  if (drupal_is_front_page()) {
    unset($vars['page']['content']['system_main']);
    $vars['title'] = '';
    drupal_set_title('');
  }
}

function wawood_language_switch_links_alter(array &$links, $type, $path)
{

  foreach ($links as $code => &$row) {
    $row['title'] = $code;
  }
}

/***
 * Helper utilities
 */
function _wawood_create_image_tag($url)
{
  return '<img src="' . $url . '">';
}

function wawood_form_comment_form_alter(&$form, &$form_state, $form_id)
{
  if ($form_id == 'comment_node_blog_form') {

    $form['actions']['preview'] = null;
    $form['actions']['submit']['#value'] = t('Post comment');

    $form['comment_body']['und'][0]['value']['#attributes']['placeholder'][] = t('Comment');
    $form['field_name']['und'][0]['value']['#attributes']['placeholder'][] = t('Name');
    $form['field_e_mail']['und'][0]['value']['#attributes']['placeholder'][] = t('E-mail');
    $form['field_website']['und'][0]['value']['#attributes']['placeholder'][] = t('Website');
  }
}
