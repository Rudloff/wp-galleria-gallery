<?php
/**
 * Plugin Name: Galleria Gallery
 * Description: Turn your galleries into Galleria galleries
 * Version: 0.1.1
 * Author: Pierre Rudloff
 * Author URI: https://rudloff.pro/
 * License: GPL3
 * Plugin URI: https://github.com/Rudloff/wp-galleria-gallery
 *
 * PHP version 5.6
 *
 * @category WordPress
 * @package  GalleriaGallery
 * @author   Pierre Rudloff <contact@rudloff.pro>
 * @license  GPL http://www.gnu.org/licenses/gpl.html
 * @link     https://github.com/Rudloff/wp-galleria-gallery
 */

function galleria_scripts() {
    wp_enqueue_script(
        'galleria',
        plugin_dir_url(__FILE__).'/bower_components/galleria/src/galleria.js',
        array('jquery')
    );
    wp_enqueue_script(
        'galleria-classic',
        plugin_dir_url(__FILE__)
        .'/bower_components/galleria/src/themes/classic/galleria.classic.js',
        array('galleria')
    );
    wp_enqueue_script(
        'galleria-gallery',
        plugin_dir_url(__FILE__).'/galleria-gallery.js',
        array('galleria-classic')
    );
}

add_action('wp_enqueue_scripts', 'galleria_scripts');

add_action( 'after_setup_theme', function()
{
    add_shortcode( 'gallery', function( $atts, $content = NULL )
    {
        $atts['link'] = 'file';
        $gallery = gallery_shortcode( $atts, $content );
        return $gallery;
    });
});
