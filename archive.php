<?php get_header(); ?>
<div class="default-page_container">
  <div class="default-page_inner">
  <h1 class="default-title"><?php the_archive_title(); ?></h1>
    <?php if (have_posts()) :
      while (have_posts()) : the_post();?>
        <div class="home_news-entry has-multiple">
          <div class="home_news-date"><?php the_date() ?></div>
          <h3><?php echo the_title(); ?></h3>
          <div class="wp-content home_news-content"><?php echo the_excerpt(); ?></div>
          <a class="home_news-readmore l-link" href="<?php the_permalink(); ?>">Read more</a>
        </div>
      <?php
      endwhile;?>
      <?php echo paginate_links(); ?>
      <?php
      else :
        echo '<h1 class="default-title">No content found</h1>';
      endif;
    ?>
  </div>
</div>
<?php get_footer(); ?>
