<?php
$link = get_field('projects') && count(get_field('projects')) > 0 ? get_permalink(get_the_ID()) : null;
?>


<div class="polaroid">
  <?php if ($link) : ?>
    <a href="<?php echo $link; ?>" class="polaroid-img-container">
  <?php else: ?>
    <div class="polaroid-img-container">
  <?php endif; ?>
    <?php if ( get_field('image') ) : ?>
      <img class="polaroid-img"
        src="<?php echo get_field('image')['sizes']['polaroid']; ?>"
        alt="<?php the_title() ?>"
      >
    <?php else: ?>
      <img class="polaroid-img"
        src="<?php echo get_template_directory_uri(); ?>/images/person_unisex.jpg"
        alt="<?php the_title() ?>"
      >
    <?php endif; ?>
  <?php if ($link) : ?>
    </a>
  <?php else: ?>
    </div>
  <?php endif; ?>


  <div class="polaroid-body">
    <?php if ($link) : ?>
      <a href="<?php echo $link; ?>" class="polaroid-link">
    <?php endif; ?>
        <h3><?php the_title() ?></h3>
    <?php if ($link) : ?>
      </a>
    <?php endif; ?>
    <?php if (get_post_type() === 'team'): ?>
      <div class="polaroid-position">Studio</div>
    <?php else: ?>
      <div class="polaroid-position"><?php echo get_field('position'); ?></div>
    <?php endif ?>
    <?php if (get_field('team')): ?>
      <div class="polaroid-team">
        at <a href="<?php echo get_permalink(get_field('team')->ID); ?>"><?php echo get_field('team')->post_title; ?></a>
      </div>
    <?php endif ?>
    <?php get_template_part('partials/social-links'); ?>
    <?php if (get_field('joined_at')): ?>
      <div class="polaroid-joined">Joined <?php echo get_field('joined_at'); ?></div>
    <?php endif ?>
  </div>
</div>
