<?php
/* Section 1 */
add_filter( 'mce_buttons', 'add_more_editor_buttons', 999 );
function add_more_editor_buttons($orig) {
    array_unshift ($orig, 'styleselect');
    return $orig;
}

/* Section 2 */
add_filter( 'tiny_mce_before_init', 'add_editor_styles' );
function add_editor_styles( $init_array ) {
    $arr = array(
        "Reset styles" => "postReset",
        "Nice Frame" => "postNiceFrame",
        "Attention" => "postAttention",
        "Left column" => "postLeftColumn",
        "Right column" => "postRightColumn"
    );
    $arrq = array();
    foreach($arr as $k=>$v) {$arrq[] = $k."=".$v;}
    $f = implode(";", $arrq);
    $init_array['theme_advanced_styles'] = $f;
    return $init_array;
}

/* Section 3 */
add_filter('mce_css', 'add_editor_new_css');
function add_editor_new_css() {
    return get_bloginfo('stylesheet_directory')."/post-styles.css";
}

/* Section 4 */
add_action('wp_print_styles', 'add_my_stylesheet');
function add_my_stylesheet() {
    wp_register_style('myStyleSheets', get_bloginfo('stylesheet_directory')."/post-styles.css");
    wp_enqueue_style( 'myStyleSheets');
}
