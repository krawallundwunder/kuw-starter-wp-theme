<?php
$context = Timber::context();
$context['title'] = get_field('title');
$context['text'] = get_field('text');

Timber::render('Index.twig', $context);
