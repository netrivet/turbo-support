<?php

function taxonomies_for_pages() {
    register_taxonomy_for_object_type('category', 'page');
}

add_action('init', 'taxonomies_for_pages');
