<?php
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
    remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );

    add_action( 'wp_enqueue_scripts', function() {
        wp_dequeue_style( 'classic-theme-styles' );
    }, 20);
?>