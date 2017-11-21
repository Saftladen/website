<?php
  get_header();
  set_query_var( 'is_entity_page', true );
?>
<?php while (have_posts()) : the_post();?>
<div class="entity_container">
  <div class="entity_aside">
    <div class="entity_aside-content">
      <h1 class="entity_title"><?php echo the_title(); ?></h1>
        <div class="entity_img-container <?php echo get_field('logo') ? "is-logo" : ""?>">
          <img class="entity_img"
            <?php if ( get_field('logo') ) : ?>
            src="<?php echo get_field('logo')['sizes']['logo']; ?>"
            <?php elseif ( get_field('image') ) : ?>
            src="<?php echo get_field('image')['sizes']['logo']; ?>"
            <?php else: ?>
            src="<?php echo get_template_directory_uri(); ?>/images/person_unisex.jpg"
            <?php endif; ?>
            alt="<?php the_title() ?>"
          >
        </div>
      <?php if ( get_field('description') ) : ?>
        <div class="entity_description wp-content"><?php echo get_field('description'); ?></div>
      <?php endif; ?>
      <?php if ( get_field('joined_at') ) : ?>
        <h3 class="entity_label">Joined Saftladen at</h3>
        <div class="entity_aside-text"><?php echo get_field('joined_at'); ?></div>
      <?php endif; ?>
      <?php
        set_query_var( 'is_black', true );
        get_template_part('partials/social-links');
        set_query_var( 'is_black', false );
      ?>
    </div>
  </div>
  <div class="entity_main">
    <?php if ((get_field('projects') && count(get_field('projects')) > 0)) : ?>
      <div class="entity_content">
        <h2 class="entity_h2">Project<?php echo count(get_field('projects')) != 1 ? "s" : ""?></h2>
        <div class="project-list">
          <?php foreach (get_field('projects') as $project): ?>
          <?php $post = $project['project']; setup_postdata($post); ?>
            <?php get_template_part('partials/project'); ?>
          <?php endforeach ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
      <?php endif; ?>
    <?php if ((get_field('people') && count(get_field('people')) > 0)) : ?>
      <div class="entity_content">
        <h2 class="entity_h2">People</h2>
        <div class="polaroid-list">
          <?php
            $members = get_field('people');
            shuffle($members)
          ?>
          <?php foreach ($members as $member): ?>
          <?php $post = $member['person']; setup_postdata($post); ?>
            <?php get_template_part('partials/polaroid'); ?>
          <?php endforeach ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    <?php endif; ?>
    </div>
  </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
