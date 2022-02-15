<?php

/* Template Name: Module page */
get_header(); ?>

<main class="w-full text-grey-800">
  <?php while (have_posts()):
    the_post();
    $context = Timber::get_context();
    $context['page'] = new Timber\Post();
    $context['layout'] = get_field('modules');
    Timber::render('modules-loader.twig', $context);
  endwhile;
// End of the loop.
?>
</main>

<?php get_footer(); ?>
