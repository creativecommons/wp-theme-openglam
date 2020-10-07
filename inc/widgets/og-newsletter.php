<?php
class WP_Widget_Newsletter_Form extends WP_Widget {
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'newsletter-form',
			'description' => 'Display the newsletter form',
		);
		$control_ops = array();
		parent::__construct( 'newsletter-form', 'Newsletter form', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		$button_text = ( ! empty( $instance['button_text'] ) ) ? esc_attr( $instance['button_text'] ) : 'Subscribe to our updates';
		$url = ( ! empty( $instance['url'] ) ) ? esc_attr( $instance['url'] ) : 'https://lists.wikimedia.org/mailman/listinfo/open-glam';
		echo '<div class="widget newsletter">';
		if ( ! empty( $instance['title'] ) ) {
			echo '<h4 class="b-header widget-title">' . esc_attr( $instance['title'] ) . '</h4>';
		}
		echo '<a href="'.$url.'" class="button is-rounded is-primary">'.$button_text.'</a>';
		echo '</div>';
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		extract( $instance );
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'url' ) . '">url: <input type="text" name="' . $this->get_field_name( 'url' ) . '" id="' . $this->get_field_id( 'url' ) . '" value="' . $instance['url'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'button_text' ) . '">Button Text: <input type="text" name="' . $this->get_field_name( 'button_text' ) . '" id="' . $this->get_field_id( 'button_text' ) . '" value="' . $instance['button_text'] . '" class="widefat" /></label></p>';

	}
}

function cc_newsletter_widget_init() {
	register_widget( 'WP_Widget_Newsletter_Form' );
}

add_action( 'widgets_init', 'cc_newsletter_widget_init' );
