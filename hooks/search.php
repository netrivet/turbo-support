<?php

/**
 * @return bool
 */
function turbo_relevanssi_supported() {
    return function_exists('relevanssi_do_query');
}

/**
 * @return bool
 */
function turbo_is_rest_search() {
    global $wp;
    $vars = $wp->query_vars;
    return isset($vars['search'], $vars['rest_route']);
}

/**
 * @param array|null $posts
 * @param WP_Query $query
 * @return array|null
 */
function turbo_relevanssi_page_search($posts, $query) {
    global $wp;

    if (! turbo_relevanssi_supported()) {
        return $posts;
    }

    if (! turbo_is_rest_search()) {
        return $posts;
    }

    if ($wp->query_vars['rest_route'] !== '/wp/v2/pages') {
        return $posts;
    }

    relevanssi_do_query($query);
    return $query->posts;
}

add_filter('posts_pre_query', 'turbo_relevanssi_page_search', 10, 2);
