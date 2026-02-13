<?php

namespace Flynt\CustomPostTypes;

add_action('init', function (): void {

    // Slug aus Options Page holen (mit Fallback)
    $archive_slug = get_field('archive_slug', 'option') ?: 'content-cards';

    $labels = [
        'name' => _x('Content-Karten', 'Post Type General Name', 'flynt'),
        'singular_name' => _x('Content-Karte', 'Post Type Singular Name', 'flynt'),
        'menu_name' => __('Content-Karten', 'flynt'),
        'name_admin_bar' => __('Content-Karte', 'flynt'),
        'archives' => __('Content-Karten Archiv', 'flynt'),
        'attributes' => __('Karten-Attribute', 'flynt'),
        'parent_item_colon' => __('Übergeordnete Karte:', 'flynt'),
        'all_items' => __('Alle Karten', 'flynt'),
        'add_new_item' => __('Neue Karte hinzufügen', 'flynt'),
        'add_new' => __('Neu hinzufügen', 'flynt'),
        'new_item' => __('Neue Karte', 'flynt'),
        'edit_item' => __('Karte bearbeiten', 'flynt'),
        'update_item' => __('Karte aktualisieren', 'flynt'),
        'view_item' => __('Karte ansehen', 'flynt'),
        'view_items' => __('Karten ansehen', 'flynt'),
        'search_items' => __('Karten suchen', 'flynt'),
        'not_found' => __('Keine Karten gefunden', 'flynt'),
        'not_found_in_trash' => __('Keine Karten im Papierkorb', 'flynt'),
        'featured_image' => __('Kartenbild', 'flynt'),
        'set_featured_image' => __('Kartenbild festlegen', 'flynt'),
        'remove_featured_image' => __('Kartenbild entfernen', 'flynt'),
        'use_featured_image' => __('Als Kartenbild verwenden', 'flynt'),
        'insert_into_item' => __('In Karte einfügen', 'flynt'),
        'uploaded_to_this_item' => __('Zu dieser Karte hochgeladen', 'flynt'),
        'items_list' => __('Karten-Liste', 'flynt'),
        'items_list_navigation' => __('Navigation der Karten-Liste', 'flynt'),
        'filter_items_list' => __('Karten-Liste filtern', 'flynt'),
    ];

    $args = [
        'label' => __('Content-Karten', 'flynt'),
        'description' => __('Flexible Content-Karten für Portfolio, Referenzen, Projekte etc.', 'flynt'),
        'labels' => $labels,
        'supports' => ['title', 'thumbnail', 'revisions', 'custom-fields'],
        'taxonomies' => ['content_card_category'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-grid-view',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => [
            'slug' => $archive_slug,
            'with_front' => false,
        ],
    ];

    register_post_type('content_card', $args);
});

// Taxonomie (Kategorien) für Content-Karten registrieren
add_action('init', function (): void {

    // Slug für Kategorie - WICHTIG: Nicht der gleiche wie Archive!
    $archive_slug = get_field('archive_slug', 'option') ?: 'content-cards';
    $category_slug = $archive_slug . '-kategorie'; // z.B. "content-cards-kategorie"

    $labels = [
        'name' => _x('Karten-Kategorien', 'taxonomy general name', 'flynt'),
        'singular_name' => _x('Kategorie', 'taxonomy singular name', 'flynt'),
        'search_items' => __('Kategorien durchsuchen', 'flynt'),
        'all_items' => __('Alle Kategorien', 'flynt'),
        'parent_item' => __('Übergeordnete Kategorie', 'flynt'),
        'parent_item_colon' => __('Übergeordnete Kategorie:', 'flynt'),
        'edit_item' => __('Kategorie bearbeiten', 'flynt'),
        'update_item' => __('Kategorie aktualisieren', 'flynt'),
        'add_new_item' => __('Neue Kategorie hinzufügen', 'flynt'),
        'new_item_name' => __('Neuer Kategorie-Name', 'flynt'),
        'menu_name' => __('Kategorien', 'flynt'),
    ];

    register_taxonomy('content_card_category', ['content_card'], [
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => [
            'slug' => $category_slug,  // ← UNTERSCHIEDLICHER SLUG!
            'with_front' => false,
        ],
        'show_in_rest' => true,
    ]);
});

add_action('acf/save_post', function ($post_id) {
    // Nur bei Options Page
    if ($post_id === 'options') {

        // Prüfen, ob der Slug sich geändert hat
        $new_slug = get_field('archive_slug', 'option');
        $old_slug = get_option('content_card_last_slug', '');

        if ($new_slug && $new_slug !== $old_slug) {
            // Flag setzen: Permalinks müssen beim nächsten Load neu generiert werden
            update_option('content_card_needs_flush', true);
            update_option('content_card_last_slug', $new_slug);
        }
    }
}, 20);

// Permalinks beim nächsten Admin-Page-Load neu generieren
add_action('admin_init', function () {
    if (get_option('content_card_needs_flush')) {
        flush_rewrite_rules();
        delete_option('content_card_needs_flush');

        // Admin-Notice setzen
        set_transient('content_card_permalinks_flushed', true, 30);
    }
});

// Admin-Notice anzeigen
add_action('admin_notices', function () {
    if (get_transient('content_card_permalinks_flushed')) {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>✅ Permalinks wurden automatisch aktualisiert!</strong> Die neuen URLs sind jetzt aktiv.</p>
        </div>
        <?php
        delete_transient('content_card_permalinks_flushed');
    }
});

// Sicherheitsnetz: Bei Theme-Aktivierung
add_action('after_switch_theme', function () {
    flush_rewrite_rules();
});
