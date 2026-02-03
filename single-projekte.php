<?php
/**
 * Template Name: Single Projekt
 * Template Post Type: projekte
 */

use Timber\Timber;

$context = Timber::context();
$context['post'] = Timber::get_post();

Timber::render('templates/single-projekte.twig', $context);
