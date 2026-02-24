<?php

namespace Flynt\CustomPostTypes;

add_action('init', function (): void {
  $taxonomyLabels = [
    'name' => _x('Gruppen / Bereiche', 'Taxonomy General Name', 'flynt'),
    'singular_name' => _x('Gruppe', 'Taxonomy Singular Name', 'flynt'),
    'menu_name' => __('Gruppen / Bereiche', 'flynt'),
    'all_items' => __('Alle Gruppen', 'flynt'),
    'edit_item' => __('Gruppe bearbeiten', 'flynt'),
    'view_item' => __('Gruppe ansehen', 'flynt'),
    'update_item' => __('Gruppe aktualisieren', 'flynt'),
    'add_new_item' => __('Neue Gruppe hinzufügen', 'flynt'),
    'new_item_name' => __('Name der neuen Gruppe', 'flynt'),
    'search_items' => __('Gruppen suchen', 'flynt'),
  ];

  $taxonomyArgs = [
    'labels' => $taxonomyLabels,
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => false,
    'show_in_rest' => true,
  ];

  register_taxonomy('team_group', ['team_member'], $taxonomyArgs);

  $labels = [
    'name' => _x('Teammitglieder', 'Post Type General Name', 'flynt'),
    'singular_name' => _x('Teammitglied', 'Post Type Singular Name', 'flynt'),
    'menu_name' => __('Teammitglieder', 'flynt'),
    'name_admin_bar' => __('Teammitglied', 'flynt'),
    'archives' => __('Archiv', 'flynt'),
    'attributes' => __('Attribute', 'flynt'),
    'parent_item_colon' => __('Übergeordnetes Element:', 'flynt'),
    'all_items' => __('Alle Teammitglieder', 'flynt'),
    'add_new_item' => __('Neues Teammitglied hinzufügen', 'flynt'),
    'add_new' => __('Neu hinzufügen', 'flynt'),
    'new_item' => __('Neues Teammitglied', 'flynt'),
    'edit_item' => __('Teammitglied bearbeiten', 'flynt'),
    'update_item' => __('Teammitglied aktualisieren', 'flynt'),
    'view_item' => __('Teammitglied ansehen', 'flynt'),
    'view_items' => __('Teammitglieder ansehen', 'flynt'),
    'search_items' => __('Teammitglieder suchen', 'flynt'),
    'not_found' => __('Nicht gefunden', 'flynt'),
    'not_found_in_trash' => __('Nicht im Papierkorb gefunden', 'flynt'),
    'featured_image' => __('Beitragsbild', 'flynt'),
    'set_featured_image' => __('Beitragsbild festlegen', 'flynt'),
    'remove_featured_image' => __('Beitragsbild entfernen', 'flynt'),
    'use_featured_image' => __('Als Beitragsbild verwenden', 'flynt'),
    'insert_into_item' => __('In Element einfügen', 'flynt'),
    'uploaded_to_this_item' => __('Zu diesem Element hochgeladen', 'flynt'),
    'items_list' => __('Elementliste', 'flynt'),
    'items_list_navigation' => __('Navigation der Elementliste', 'flynt'),
    'filter_items_list' => __('Elementliste filtern', 'flynt'),
  ];

  $args = [
    'label' => __('Teammitglieder', 'flynt'),
    'description' => __('Post Type für Teammitglieder', 'flynt'),
    'labels' => $labels,
    'supports' => ['title', 'revisions'],
    'taxonomies' => ['team_group'],
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-groups',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => false,
    'can_export' => true,
    'has_archive' => false,
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'capability_type' => 'page',
  ];

  register_post_type('team_member', $args);
});
