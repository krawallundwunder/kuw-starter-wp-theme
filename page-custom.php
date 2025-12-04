<?php

/**
 * Template Name: Custom Page
 */

use Timber\Timber;

$context = Timber::context();
$context['page_template'] = get_page_template_slug($post->ID);

Timber::render('templates/page.twig', $context);
