<?php
// ACF layout: portfolio_item inside flexible content: page_builder_sections

$project_title   = get_sub_field('project_title');
$project_date    = get_sub_field('project_date');
$project_tools   = get_sub_field('project_tools');
$project_image   = get_sub_field('project_image');
$initial_image_url = $project_image['url'] ?? '';
$initial_image_alt = $project_image['alt'] ?? '';

// Collect project details for rendering and JS
$details_data = [];
if (have_rows('project_details')) {
  while (have_rows('project_details')): the_row();
    $details_data[] = [
      'subject' => get_sub_field('subject'),
      'content' => wpautop(get_sub_field('content')), // Make sure WYSIWYG formats properly
      'image'   => get_sub_field('image')
    ];
  endwhile;
}
?>

<section class="max-w-6xl mx-auto px-4 py-10">
  <div class="flex flex-col md:flex-row md:gap-12">
    
    <!-- Left: Image -->
    <div class="md:w-1/2 relative h-96 rounded-lg shadow-lg overflow-hidden bg-gray-100 mb-8 md:mb-0">
      <?php if ($initial_image_url): ?>
        <img
          id="project-main-image"
          src="<?php echo esc_url($initial_image_url); ?>"
          alt="<?php echo esc_attr($initial_image_alt); ?>"
          class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 opacity-100"
          loading="lazy"
        />
      <?php endif; ?>
    </div>

    <!-- Right: Text Content -->
    <div class="md:w-1/2 flex flex-col">
      <?php if ($project_title): ?>
        <h2 class="text-4xl font-bold mb-2"><?php echo esc_html($project_title); ?></h2>
      <?php endif; ?>

      <?php if ($project_date): ?>
        <p class="italic text-gray-600 mb-2"><?php echo esc_html($project_date); ?></p>
      <?php endif; ?>

      <?php if ($project_tools): ?>
        <p class="font-semibold text-gray-800 mb-4">Tools: <?php echo esc_html($project_tools); ?></p>
      <?php endif; ?>

      <?php if (!empty($details_data)): ?>
        <!-- Detail Tabs -->
        <div class="flex flex-wrap gap-2 mb-6">
          <?php foreach ($details_data as $index => $detail): ?>
            <button
              type="button"
              data-index="<?php echo esc_attr($index); ?>"
              class="project-detail-tab px-4 py-2 border rounded-md text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition
                <?php echo $index === 0 ? 'bg-indigo-600 text-white font-semibold' : 'bg-white'; ?>"
            >
              <?php echo esc_html($detail['subject']); ?>
            </button>
          <?php endforeach; ?>
        </div>

        <!-- Detail Content -->
        <div id="project-detail-content" class="prose max-w-none text-gray-700">
          <?php echo $details_data[0]['content']; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<script>
(function(){
  const tabs = document.querySelectorAll('.project-detail-tab');
  const mainImage = document.getElementById('project-main-image');
  const contentBox = document.getElementById('project-detail-content');

  const details = <?php echo json_encode($details_data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;

  function setActiveTab(index) {
    tabs.forEach((tab, i) => {
      if (i === index) {
        tab.classList.add('bg-indigo-600', 'text-white', 'font-semibold');
        tab.classList.remove('bg-white');
      } else {
        tab.classList.remove('bg-indigo-600', 'text-white', 'font-semibold');
        tab.classList.add('bg-white');
      }
    });
  }

  function fadeOutIn(element, newContent) {
    element.style.opacity = 0;
    setTimeout(() => {
      if (element.tagName === 'IMG') {
        element.src = newContent.src;
        element.alt = newContent.alt || '';
      } else {
        element.innerHTML = newContent.html;
      }
      element.style.opacity = 1;
    }, 300);
  }

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const idx = parseInt(tab.dataset.index);
      if (isNaN(idx) || !details[idx]) return;

      setActiveTab(idx);

      const newImage = details[idx].image;
      fadeOutIn(mainImage, {
        src: newImage?.url || '<?php echo esc_js($initial_image_url); ?>',
        alt: newImage?.alt || '<?php echo esc_js($initial_image_alt); ?>'
      });

      fadeOutIn(contentBox, {
        html: details[idx].content
      });
    });
  });
})();
</script>
