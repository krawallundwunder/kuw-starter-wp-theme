<?php

/* Template Name: Posts page */
get_header(); ?>

<main id="primary" class="site-main">
    <?php
    $context = Timber::context();
    $context['post'] = new Timber\Post();

    global $paged;
    if (!isset($paged) || !$paged) {
      $paged = 1;
    }

    $args_cp = [
      'post_type' => 'post',
      'posts_per_page' => 6,
      'paged' => $paged,
    ];
    $context['posts'] = new Timber\PostQuery($args_cp);

    Timber::render('posts.twig', $context);
    ?>

</main><!-- #main -->
<footer>

</footer><!-- #colophon -->
<?php get_footer();
