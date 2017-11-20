<?php
  get_header();
  set_query_var( 'is_entity_page', true );
?>
<div class="default-page_container">
  <div class="default-page_inner">
    <?php if (have_posts()) :
      while (have_posts()) : the_post();?>
        <h1 class="default-title"><?php echo the_title(); ?></h1>
        <?php if ( get_field('description') ) : ?>
          <div class="entity_content">
            <div class="wp-content"><?php echo get_field('description'); ?></div>
          </div>
        <?php endif; ?>
        <?php if ((get_field('projects') && count(get_field('projects')) > 0)) : ?>
          <div class="entity_content">
            <h2 class="entity_h2">Project<?php echo count(get_field('projects')) != 1 ? "s" : ""?></h2>
            <div class="project-list is-left">
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
            <div class="polaroid-list is-left">
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
      <?php
      endwhile;
      else :
        echo '<h1 class="default-title">No content found</h1>';
      endif;
    ?>
  </div>
</div>
<?php get_footer(); ?>
