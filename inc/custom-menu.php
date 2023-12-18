<?php
class Custom_Menu extends Walker_Nav_Menu {

    function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        global $wp_query;

        $item = $data_object;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
        $output .= $indent . '';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link"';

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        $output .= "\n";
    }
}

function my_nav_menu( $args ) {

    $args = array_merge( [
        'container_class' => 'menu',
        'echo'            => false,
        'items_wrap'      => '%3$s',
        'depth'           => 10,
        'walker'          => new Custom_Menu()
    ], $args );

    echo wp_nav_menu( $args );
}
?>