<?php

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';


/**
 * Pre get posts
 */
require get_template_directory() . '/inc/pre-get-posts.php';


/**
 * ACF
 */
require get_template_directory() . '/inc/acf.php';

/**
 * HELPERS
 */
require get_template_directory() . '/inc/helpers.php';


