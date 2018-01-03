
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" />
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>

<?php
$post = get_post(get_option('page_on_front'));
setup_postdata($post);
?>

<body <?php body_class(); ?>>
  <header class="main-header">
    <a href="<?php echo home_url(); ?>" class="main-header-brand-link">
      <img
        class="main-header-image"
        src="<?php echo get_field('top_image', $post)['sizes']['tiny']; ?>"
        alt="<?php echo get_field('top_image', $post)['alt'] ?>"
      />
    </a>
    <nav class="main-header_nav">
      <?php wp_nav_menu(['theme_location' => 'primary', 'container' => false, 'menu_class' => 'main-header_nav-menu', 'depth' => 1]); ?>
    </nav>
    <div class="main-header-social">
      <?php get_template_part('partials/social-links'); ?>
    </div>
  </header><!-- /site-header -->
  <div class="content-container">

  <?php wp_reset_postdata(); ?>