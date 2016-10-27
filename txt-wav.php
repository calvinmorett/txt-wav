<?php
/*
Plugin Name: txt.wav
Plugin URI: https://www.stilllife.studio/txtwav
Description: Some weird text animations the internet deserves.
Author: George Mayorga (plugin by Damien Carbery)
Version: $Revision: 4087 $

$Id: txt-wav.php 4087 2016-10-27 11:26:26Z damien $
*/



add_action('get_header','tw_txt_wav_files');
function tw_txt_wav_files() {
    add_action( 'wp_enqueue_scripts', 'tw_enqueue_local_styles' );
}


// Add txt.wav CSS and JS files.
function tw_enqueue_local_styles() {
    //wp_enqueue_style( 'txt_wav', plugin_dir_url( __FILE__ ) . 'txt.wav.min.css' );
    // Use the live file.
    wp_enqueue_style( 'txt_wav', 'https://cdn.rawgit.com/still-life-studio/txt.wav/master/dist/css/txt.wav.min.css' );
    
    //wp_enqueue_script( 'txt-wav', plugin_dir_url( __FILE__ ) . 'txt.wav.min.js', array(), '1.0', true );
    // Use the live file.
    wp_enqueue_script( 'txt-wav', 'https://cdn.rawgit.com/still-life-studio/txt.wav/master/dist/js/txt.wav.min.js', array(), '1.0', true );
}


// Add txtwav classes.
add_filter( 'genesis_attr_entry-title', 'tw_entry_title_txtwav_classes' );
function tw_entry_title_txtwav_classes( $attributes ) {
    $wav_types = array('slow', 'vibe', 'bounce', 'flip');
    $wav_type = array_rand($wav_types);

    $attributes['class'] .= ' txtwav '.$wav_types[$wav_type];
    return $attributes;
}

add_filter( 'genesis_featured_post_title', 'tw_featured_post_title_txtwav_classes', 10, 3 ); 
function tw_featured_post_title_txtwav_classes($title, $instance, $args) {
    $wav_types = array('slow', 'vibe', 'bounce', 'flip');
    $wav_type = array_rand($wav_types);

    return sprintf('<span class="txtwav %s">%s</span>', $wav_types[$wav_type], $title);
}