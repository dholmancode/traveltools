<?php
/*
Template Name: DGH_Page_Builder
*/

get_header();
?>

<div id="dgh-page-builder-content">
  <?php
  if (have_rows('dgh_page_builder_sections')) :
    while (have_rows('dgh_page_builder_sections')) : the_row();
      get_template_part('template-parts/' . get_row_layout());
    endwhile;
  else :
    echo '<p class="text-center py-20 text-gray-500">No content found. Add flexible sections in the Page Builder.</p>';
  endif;
  ?>
</div>

<?php get_footer(); ?>
