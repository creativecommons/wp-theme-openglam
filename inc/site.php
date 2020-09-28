<?php

class openGlam {
  static function get_header_image() {
      $image = get_theme_mod( 'openglam_header_image' );
      $attribution_text =  get_theme_mod( 'openglam_image_attribution', 'Fifty-three Stations on the Tokaido: Boundary Marker near Fujikawa.' );
      $image_link = get_theme_mod( 'openglam_image_url' );

      $out = '';
      $out .=  '<header class="homepage-header">';
      $out .= '<figure class="top-header-image">';
        if ( !empty( $image_link ) ) {
          $out .= '<a href="'.$image_link.'">';
        }
          if ( !empty( $image ) ) {
            $out .= wp_get_attachment_image( $image, 'landscape-featured' );
          } else {
            $out .= '<img src="' . THEME_IMG . '/top-img.jpg" alt="">';
          }
          $out .= '<span class="attribution">'.$attribution_text.'</span>';
          if ( !empty( $image_link ) ) {
            $out .= '</a>';
          }
        $out .= '</figure>';
      $out .= '</header>';
    return $out;  
  }
  static function get_breadcrumb() {
    $current = get_queried_object();
    $current_page = $current->post_title;
    $breadcrumbs = '<div class="breadcrumbs">';
    if ( is_page() ) {
      $breadcrumbs .= '<a href="'.get_bloginfo('url').'">Home</a> <i class="icon chevron-right"></i> ';
      if ( $current->post_parent ) {
        $parent_id = $current->post_parent;
        while ( $parent_id != 0 ) {
          $page = get_page( $parent_id );
          $breadcrumbs .= ' <a href="'.get_permalink( $page->ID ).'">' . get_the_title( $page->ID ) . '</a> <i class="icon chevron-right"></i> ';
          $parent_id = $page->post_parent;
        }
      }
      $breadcrumbs .= $current_page;
    }
    $breadcrumbs .= '</div>';
    return $breadcrumbs;
  }
}