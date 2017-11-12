<?php get_header(); ?>
<div class="default-page_container">
  <div class="default-page_inner">
    <?php if (have_posts()) :
      while (have_posts()) : the_post();?>
        <h1 class="default-title"><?php echo the_title(); ?></h1>
        <div class="wp-content default-content"><?php echo the_content(); ?></div>
      <?php
      endwhile;
      else :
        echo '<h1 class="default-title">No content found</h1>';
      endif;
    ?>
  </div>
</div>
<?php get_footer(); ?>
