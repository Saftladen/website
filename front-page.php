<?php get_header();?>

<?php while (have_posts()) : the_post();?>

<div class="home_top-container">
  <img
    class="home_top-image"
    src="<?php echo get_field('top_image')['sizes']['big']; ?>"
    alt="<?php echo get_field('top_image')['alt'] ?>"
  />
</div>
<div class="home_intro wp-content">
  <?php echo get_field('intro_text'); ?>
</div>
<div class="home_members" id="people">
  <h2>Studios & People</h2>
  <div class="polaroid-list">
    <?php
      $members = get_field('entities');
      shuffle($members)
    ?>
    <?php foreach ($members as $member): ?>
    <?php $post = $member['entity']; setup_postdata($post); ?>
      <?php get_template_part('partials/polaroid'); ?>
    <?php endforeach ?>
    <?php wp_reset_postdata(); ?>
  </div>

</div>
<h2 class="home_map-title">Where are we?</h2>
<div class="home_map" id="map">
  <?php get_template_part('partials/map'); ?>
</div>
<div class="home_map-description wp-content"><?php echo get_field('location_description'); ?></div>
<?php endwhile; ?>
<div class="home_projects" id="projects">
  <h2>What we make</h2>
  <div class="project-list">
    <?php
      $projects = get_posts([
        'numberposts' => -1,
        'post_type'   => 'project',
        'suppress_filters' => 0,
        'orderby' => 'rand'
      ]);
      ?>
    <?php foreach ($projects as $post): setup_postdata($post);?>
      <?php get_template_part('partials/project'); ?>
    <?php endforeach ?>
    <?php wp_reset_postdata(); ?>
  </div>
</div>
<div class="home_news">
  <h2>Latest news</h2>
  <?php
    $recent = wp_get_recent_posts(['numberposts' => '1'])
  ?>
  <?php foreach ($recent as $post): setup_postdata($post);?>
    <div class="home_news-entry">
      <div class="home_news-date"><?php the_date() ?></div>
      <h3><?php the_title(); ?></h3>
      <div class="home_news-content wp-content"><?php the_excerpt(); ?></div>
      <a class="home_news-readmore l-link" href="<?php the_permalink(); ?>">Read more</a>
    </div>
  <?php endforeach ?>
  <?php wp_reset_postdata(); ?>
</div>

<div class="home_newsletter">
  <h2>Sign up to our newsletter</h2>
  <form action="https://berlin.us13.list-manage.com/subscribe/post?u=8de5706e21d76efd1812b70e5&amp;id=e8e15e4aa6" method="post" name="mc-embedded-subscribe-form" target="_blank" class="home_newsletter-form">
    <label class="home_newsletter-label" for="mce-EMAIL">Your email address </label>
    <input type="email" value="" name="EMAIL" id="mce-EMAIL" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8de5706e21d76efd1812b70e5_e8e15e4aa6" tabindex="-1" value=""></div>
    <button type="submit" name="subscribe" class="l-btn">Subscribe</button>
  </form>
</div>

<div class="home_faq">
  <h2>FAQ</h2>
  <?php while( have_rows('faq') ) : the_row(); ?>
    <div class="home_faq-entry">
      <h3><?php the_sub_field('question'); ?></h3>
      <div class="home_faq-answer wp-content">
        <?php echo get_sub_field('answer'); ?>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<div class="home_twitter">
  <div class="home_twitter-box">
    <a class="twitter-timeline" data-height="1200" data-dnt="true" data-theme="light" href="https://twitter.com/saftladenberlin?ref_src=twsrc%5Etfw">Tweets by saftladenberlin</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  </div>
</div>
<?php get_footer(); ?>
