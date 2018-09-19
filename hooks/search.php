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

/**
 * Render the markup for a ProPhoto version selector
 */
function turbo_search_version_selector() {
    $cookiedVersion = isset($_COOKIE['pp_user_version']) && $_COOKIE['pp_user_version'] === '6' ? '6' : '7';
    $pluginRoot = dirname(__DIR__);
    require_once $pluginRoot . '/views/version_selector.php';
}

/**
 * Modify the WordPress query vars to filter search based on ProPhoto version catetgory
 * before Relevanssi has a crack at it
 *
 * @param WP_Query $wp
 * @return WP_Query
 */
function turbo_filter_post_version($wp) {
    $cookiedVersion = isset($_COOKIE['pp_user_version']) && $_COOKIE['pp_user_version'] === '6' ? '6' : '7';
    $catId = get_cat_ID("ProPhoto {$cookiedVersion}");
    $wp->query_vars['category__in'] = [$catId];
    return $wp;
}

add_filter('relevanssi_modify_wp_query', 'turbo_filter_post_version');
add_shortcode('turbo_search_version_selector', 'turbo_search_version_selector');
add_filter('posts_pre_query', 'turbo_relevanssi_page_search', 10, 2);
