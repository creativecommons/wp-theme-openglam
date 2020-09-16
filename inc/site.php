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
}