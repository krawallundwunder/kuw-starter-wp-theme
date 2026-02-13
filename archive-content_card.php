<?php
/**
 * Archive Template für Content Cards
 */

use Timber\Timber;

$context = Timber::context();

// Pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Posts per Page aus ACF oder Fallback
$posts_per_page = get_field('archive_posts_per_page', 'option') ?: 10;
$order = get_field('archive_order', 'option') ?: 'DESC';

$args = [
    'post_type' => 'content_card',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => $order,
];

// Wenn Kategorie-Filter aktiv
if (is_tax('content_card_category')) {
    $term = get_queried_object();
    $args['tax_query'] = [
        [
            'taxonomy' => 'content_card_category',
            'field' => 'slug',
            'terms' => $term->slug,
        ],
    ];
    $context['current_category'] = $term;
}

$context['posts'] = Timber::get_posts($args);
$context['pagination'] = Timber::get_pagination();

// Alle Kategorien für Filter
$context['categories'] = Timber::get_terms([
    'taxonomy' => 'content_card_category',
    'hide_empty' => true,
]);

// Archive-Texte aus ACF Options Page
$context['archive_title'] = get_field('archive_title', 'option') ?: 'Unsere Content-Karten';
$context['archive_description'] = get_field('archive_description', 'option') ?: 'Entdecken Sie unsere Projekte, Referenzen und Case Studies.';
$context['archive_button_text'] = get_field('archive_button_text', 'option') ?: 'Alle Projekte';  // ← HIER!

// Archive-URL dynamisch übergeben
$context['archive_url'] = get_post_type_archive_link('content_card');

Timber::render('templates/archive-content_card.twig', $context);
