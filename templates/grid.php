<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

/* Template Name: Sample Grid */

/**
 * Sample Grid
 *
 */
function pp_sample_grid() {

    $types = array(
        'lg' => array(
            'class' => 'row visible-lg-block',
            'sizes' => array(
                array( 12 ),
                array( 6, 6 ),
                array( 4, 4, 4 ),
                array( 3, 3, 3, 3 ),
                array( 2, 2, 2, 2, 2, 2 ),
                array( 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ),
            ),
        ),
        'md' => array(
            'class' => 'row hidden-sm hidden-xs',
            'sizes' => array(
                array( 12 ),
                array( 6, 6 ),
                array( 4, 4, 4 ),
                array( 3, 3, 3, 3 ),
                array( 2, 2, 2, 2, 2, 2 ),
                array( 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ),
            )
        ),
        'sm' => array(
            'class' => 'row hidden-xs',
            'sizes' => array(
                array( 12 ),
                array( 6, 6 ),
                array( 4, 4, 4 ),
                array( 3, 3, 3, 3 ),
                array( 2, 2, 2, 2, 2, 2 ),
                array( 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ),
            )
        ),
        'xs' => array(
            'class' => 'row',
            'sizes' => array(
                array( 12 ),
                array( 6, 6 ),
                array( 4, 4, 4 ),
                array( 3, 3, 3, 3 ),
            )
        )
    );

    echo '<div class="sample-grid full-section"><div class="container-fluid">';
    foreach( $types as $type => $settings ) {
        foreach( $settings['sizes'] as $size ) {
            echo '<div class="' . $settings['class'] . '">';
                foreach( $size as $i ) {
                    echo '<div class="col-' . $type . '-' . $i . '"><div>.col-' . $type . '-' . $i . '</div></div>';
                }
            echo '</div>';
        }
        echo '<div class="row divider"></div>';
    }
    echo '</div></div>';

}
add_action( 'tha_footer_before', 'pp_sample_grid' );

// Build the page
require get_template_directory() . '/index.php';
