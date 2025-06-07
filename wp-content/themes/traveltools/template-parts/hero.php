<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$background_image = get_sub_field('background_image');
$h1_color = get_sub_field('h1_color');
$subtitle_color = get_sub_field('subtitle_color');
$hero_overlay = get_sub_field('hero_overlay'); // This is the new color picker field
?>

<section class="relative bg-cover bg-center py-20" style="background-image: url('<?php echo esc_url($background_image['url']); ?>');">
  
  <!-- Overlay -->
  <?php if ($hero_overlay): ?>
    <div class="absolute inset-0" style="background-color: <?php echo esc_attr($hero_overlay); ?>; opacity: 0.5; pointer-events: none;"></div>
  <?php endif; ?>

  <div class="relative container mx-auto px-4 text-center max-w-4xl">
    <?php if ($title): ?>
      <h1 class="text-4xl font-extrabold mb-4" style="color: <?php echo esc_attr($h1_color ?: '#fff'); ?>;">
        <?php echo esc_html($title); ?>
      </h1>
    <?php endif; ?>

    <?php if ($subtitle): ?>
      <h1 class="text-lg drop-shadow-md" style="color: <?php echo esc_attr($subtitle_color ?: '#eee'); ?>;">
        <?php echo esc_html($subtitle); ?>
      </h1>
    <?php endif; ?>
  </div>
</section>
