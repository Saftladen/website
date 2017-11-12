<?php if ( get_field('external_link') || (get_field('social_media') && count(get_field('social_media')) > 0)) : ?>
  <div class="social_list">
    <?php if ( get_field('external_link') ) : ?>
      <a href="<?php echo get_field('external_link'); ?>" target="_blank" class="social_item">
        <img src="<?php echo get_template_directory_uri(); ?>/images/social/home.svg" alt="homepage" class="social_icon">
      </a>
    <?php endif; ?>
    <?php while ( have_rows('social_media' ) ) : the_row(); ?>
    <a href="<?php echo get_sub_field('url'); ?>" target="_blank" class="social_item">
      <img src="<?php echo get_template_directory_uri(); ?>/images/social/<?php echo get_sub_field('type'); ?>.svg" alt="<?php echo get_sub_field('type'); ?>" class="social_icon">
    </a>
    <?php endwhile; ?>
  </div>
<?php endif ?>
