<?php

namespace Flynt\FieldGroups;

// ACF Options Page für Content Cards Archive registrieren
add_action('acf/init', function () {
    if (function_exists('acf_add_options_sub_page')) {
        acf_add_options_sub_page([
            'page_title'  => __('Content-Karten Übersicht', 'flynt'),
            'menu_title'  => __('Content-Karten Übersicht', 'flynt'),
            'menu_slug'   => 'content-karten-übersicht',
            'parent_slug' => 'edit.php?post_type=content_card',
            'capability'  => 'edit_posts',
        ]);
    }
});

