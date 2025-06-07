<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white text-gray-900'); ?>>

<header class="bg-gray-800 text-white">
  <div class="container mx-auto flex items-center justify-between p-4">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold">
      <?php 
      if (has_custom_logo()) {
        the_custom_logo();
      } else {
        bloginfo('name');
      }
      ?>
    </a>

    <nav>
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'menu_class' => 'flex space-x-6',
        'container' => false,
        'fallback_cb' => false,
        'depth' => 1,
        'walker' => new class extends Walker_Nav_Menu {
          function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            $output .= '<li><a href="' . esc_url($item->url) . '" class="hover:text-yellow-400">' . esc_html($item->title) . '</a></li>';
          }
          function end_el(&$output, $item, $depth = 0, $args = null) {
            $output .= '</li>';
          }
        }
      ]);
      ?>
    </nav>
  </div>
</header>
