<footer class="bg-gray-900 text-gray-400 py-8">
  <div class="container mx-auto px-4 text-center">
    <nav class="mb-4">
      <?php
      wp_nav_menu([
        'theme_location' => 'footer',
        'menu_class' => 'flex justify-center space-x-6',
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
    <p class="text-sm">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
