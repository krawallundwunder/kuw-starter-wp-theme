<?php

namespace Flynt\CustomPostTypes;

add_action('init', function (): void {

    $labels = [
        'name' => _x('Projekte', 'Post Type General Name', 'flynt'), // Name im Menü (Plural)
        'singular_name' => _x('Projekt', 'Post Type Singular Name', 'flynt'), // Name für Einzelprojekt
        'menu_name' => __('Projekte', 'flynt'), // Menüpunkt Text
        'name_admin_bar' => __('Projekt', 'flynt'), // Text oben im Admin Bar
        'archives' => __('Projekt-Archiv', 'flynt'), // Archiv-Titel
        'attributes' => __('Projekt-Attribute', 'flynt'), // Metabox Attribute
        'parent_item_colon' => __('Übergeordnetes Projekt:', 'flynt'), // Bei Hierarchie
        'all_items' => __('Alle Projekte', 'flynt'), // Alle anzeigen
        'add_new_item' => __('Neues Projekt hinzufügen', 'flynt'), // Neu hinzufügen
        'add_new' => __('Neu hinzufügen', 'flynt'), // Button „Neu hinzufügen“
        'new_item' => __('Neues Projekt', 'flynt'), // Einzelnes Projekt
        'edit_item' => __('Projekt bearbeiten', 'flynt'), // Bearbeiten
        'update_item' => __('Projekt aktualisieren', 'flynt'), // Aktualisieren
        'view_item' => __('Projekt ansehen', 'flynt'), // Ansicht
        'view_items' => __('Projekte ansehen', 'flynt'), // Mehrere ansehen
        'search_items' => __('Projekte suchen', 'flynt'), // Suchfeld
        'not_found' => __('Nicht gefunden', 'flynt'), // Wenn leer
        'not_found_in_trash' => __('Nicht im Papierkorb gefunden', 'flynt'),
        'featured_image' => __('Beitragsbild', 'flynt'), // Featured Image Label
        'set_featured_image' => __('Beitragsbild festlegen', 'flynt'),
        'remove_featured_image' => __('Beitragsbild entfernen', 'flynt'),
        'use_featured_image' => __('Als Beitragsbild verwenden', 'flynt'),
        'insert_into_item' => __('In Projekt einfügen', 'flynt'),
        'uploaded_to_this_item' => __('Zu diesem Projekt hochgeladen', 'flynt'),
        'items_list' => __('Projektliste', 'flynt'),
        'items_list_navigation' => __('Navigation der Projektliste', 'flynt'),
        'filter_items_list' => __('Projektliste filtern', 'flynt'),
    ];

    // Argumente für den CPT, steuern Funktionalität & Backend-Anzeige
    $args = [
        'label' => __('Projekte', 'flynt'), // Hauptbezeichnung
        'description' => __('CPT für Projekte', 'flynt'), // Beschreibung
        'labels' => $labels, // Labels oben zuweisen
        'supports' => ['title', 'thumbnail', 'revisions'], // Welche Felder unterstützt werden
        'taxonomies' => [], // Hier kann später z.B. 'project_category' eingetragen werden
        'hierarchical' => false, // false = wie Beiträge, true = wie Seiten (Eltern-Kind)
        'public' => true, // true = sichtbar im Frontend
        'show_ui' => true, // true = zeigt Editoren im Backend
        'show_in_menu' => true, // true = Menüpunkt links im Backend
        'menu_position' => 20, // Position im Menü
        'menu_icon' => 'dashicons-portfolio', // Icon im Menü
        'show_in_admin_bar' => true, // true = auch oben im Admin Bar sichtbar
        'show_in_nav_menus' => true, // true = in Menüs wählbar
        'can_export' => true, // true = CPT exportierbar
        'has_archive' => true, // true = eigenes Archiv, false = nur einzelne Beiträge
        'exclude_from_search' => false, // true = nicht in WP-Suche
        'publicly_queryable' => true, // true = Frontend-Abfragen möglich
        'capability_type' => 'post', // welche Berechtigungen gelten
    ];

    // CPT registrieren – WordPress weiß jetzt, dass es diesen Post Type gibt
    register_post_type('projekte', $args);

});
