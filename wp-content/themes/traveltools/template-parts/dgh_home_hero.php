<?php
$title = get_sub_field('title');

$cta_1 = get_sub_field('cta_1'); // Link array
$cta_1_desc = get_sub_field('cta_1_description');

$cta_2 = get_sub_field('cta_2');
$cta_2_desc = get_sub_field('cta_2_description');

$cta_3 = get_sub_field('cta_3');
$cta_3_desc = get_sub_field('cta_3_description');

$bg_images = get_sub_field('background_images'); // repeater field for background images
?>

<section class="relative h-[800px] text-white flex items-center justify-center text-center overflow-hidden">
  <div id="bg-slideshow" class="absolute inset-0 -z-10">
    <?php if ($bg_images): ?>
      <?php foreach ($bg_images as $index => $bg): 
        $img_url = esc_url($bg['image']['url'] ?? '');
        $active_class = $index === 0 ? 'opacity-100' : 'opacity-0';
      ?>
        <div 
          class="absolute inset-0 bg-center bg-cover bg-no-repeat transition-opacity duration-[1500ms] ease-in-out <?php echo $active_class; ?>"
          style="background-image: url('<?php echo $img_url; ?>');"
          data-index="<?php echo $index; ?>"
        ></div>
      <?php endforeach; ?>
    <?php endif; ?>
    <div class="absolute inset-0 bg-black bg-opacity-40 pointer-events-none"></div>
  </div>

  <div class="container dgh-hero-cta mx-auto px-4 relative z-10 max-w-4xl">
    <?php if ($title): ?>
      <h1 class="text-4xl md:text-6xl font-extrabold mb-10 drop-shadow-lg"><?php echo esc_html($title); ?></h1>
    <?php endif; ?>

    <div class="flex flex-col md:flex-row justify-center gap-8">
      <?php if ($cta_1): ?>
        <div class="max-w-xs text-center">
          <a href="<?php echo esc_url($cta_1['url']); ?>"
             class="inline-block px-6 py-3 bg-black text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 transition duration-300"
             target="<?php echo esc_attr($cta_1['target'] ?? '_self'); ?>">
            <?php echo esc_html($cta_1['title']); ?>
          </a>
          <p class="mt-2 text-sm text-gray-300"><?php echo esc_html($cta_1_desc); ?></p>
        </div>
      <?php endif; ?>

      <?php if ($cta_2): ?>
        <div class="max-w-xs text-center">
          <a href="<?php echo esc_url($cta_2['url']); ?>"
             class="inline-block px-6 py-3 bg-black text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 transition duration-300"
             target="<?php echo esc_attr($cta_2['target'] ?? '_self'); ?>">
            <?php echo esc_html($cta_2['title']); ?>
          </a>
          <p class="mt-2 text-sm text-gray-300"><?php echo esc_html($cta_2_desc); ?></p>
        </div>
      <?php endif; ?>

      <?php if ($cta_3): ?>
        <div class="max-w-xs text-center">
          <a href="<?php echo esc_url($cta_3['url']); ?>"
             class="inline-block px-6 py-3 bg-black text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 transition duration-300"
             target="<?php echo esc_attr($cta_3['target'] ?? '_self'); ?>">
            <?php echo esc_html($cta_3['title']); ?>
          </a>
          <p class="mt-2 text-sm text-gray-300"><?php echo esc_html($cta_3_desc); ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
