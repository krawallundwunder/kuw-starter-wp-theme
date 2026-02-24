<?php
/**
 * Template Name: Single Projekt
 * Template Post Type: projekte
 */

use Timber\Timber;

$context = Timber::context();
$context['post'] = Timber::get_post();

$context['archive_url'] = get_post_type_archive_link('content_card');
$context['archive_button_text'] = get_field('archive_button_text', 'option') ?: 'Alle Projekte';

Timber::render('templates/single-content_card.twig', $context);
