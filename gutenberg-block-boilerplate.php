<?php
/**
 * Plugin Name: Gutenberg block boilerplate
 * Plugin URI: https://github.com/mthchz/
 * Description: Boilerplate plugin for Gutenberg Block API
 * Version: 1.0.0
 * Author: Mathieu Cheze (mthchz)
 *
 * Based on https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type/
 */

function gutenberg_boilerplate_block() {
    $dir = dirname( __FILE__ );

    // Editor
    wp_register_script(
        'gutenberg-boilerplate-editor-js',
        plugins_url( 'editor/js/block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' ),
        filemtime( "$dir/editor/js/block.js" )
    );
    wp_register_style(
        'gutenberg-boilerplate-editor-css',
        plugins_url( 'editor/css/editor.css', __FILE__ ),
        array( 'wp-edit-blocks' ),
        filemtime( "$dir/editor/css/editor.css" )

    );

    // Front
    // If rendering in PHP (comment rendering in editor/js/block.js)
    // require_once $dir . '/front/block.php';

    wp_register_style(
        'gutenberg-boilerplate-front',
        plugins_url( 'front/css/front.css', __FILE__ ),
        array( 'wp-blocks' ),
        filemtime( "$dir/front/css/front.css" )
    );

    // Register block
    register_block_type( 'gutenberg-boilerplate/hello-world', array(
        'editor_script' => 'gutenberg-boilerplate-editor-js',
        'editor_style'  => 'gutenberg-boilerplate-editor-css',
        'style' => 'gutenberg-boilerplate-front'
    ) );

}
add_action( 'init', 'gutenberg_boilerplate_block' );
