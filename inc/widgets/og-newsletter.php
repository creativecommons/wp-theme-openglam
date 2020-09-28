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
    $subscribe_url = 'https://lists.wikimedia.org/mailman/subscribe/open-glam';
		$button_text = ( ! empty( $instance['button_text'] ) ) ? esc_attr( $instance['button_text'] ) : 'Join';
		$placeholder = ( ! empty( $instance['placeholder'] ) ) ? esc_attr( $instance['placeholder'] ) : 'Enter your email';
		echo '<div class="widget newsletter">';
		if ( ! empty( $instance['title'] ) ) {
			echo '<h4 class="b-header widget-title">' . esc_attr( $instance['title'] ) . '</h4>';
		}
		if ( ! empty( $instance['byline'] ) ) {
			echo '<small class="widget-byline">' . esc_attr( $instance['byline'] ) . '</small>';
		}
		echo '<form method="post" action="'.$subscribe_url.'">';
		echo '<div class="field has-addons">';
		echo '<div class="control has-icons-left">';
		echo '<input type="text" class="input" name="email" placeholder="' . $placeholder . '" value="" />';
    echo '<span class="icon-container">';
    echo '<i class="icon envelope"></i>';
    echo '</span>';
		echo '</div>';
		echo '<div class="control">';
		echo '<input type="submit" alt="Search" name="name="email-button" class="button small is-primary" value="' . $button_text . '" />';
		echo '</div>';
		echo '</div>';
		echo '</form>';
		echo '</div>';
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		extract( $instance );
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'byline' ) . '">Byline: <input type="text" name="' . $this->get_field_name( 'byline' ) . '" id="' . $this->get_field_id( 'byline' ) . '" value="' . $instance['byline'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'placeholder' ) . '">Placeholder: <input type="text" name="' . $this->get_field_name( 'placeholder' ) . '" id="' . $this->get_field_id( 'placeholder' ) . '" value="' . $instance['placeholder'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'button_text' ) . '">Button Text: <input type="text" name="' . $this->get_field_name( 'button_text' ) . '" id="' . $this->get_field_id( 'button_text' ) . '" value="' . $instance['button_text'] . '" class="widefat" /></label></p>';

	}
}

function cc_newsletter_widget_init() {
	register_widget( 'WP_Widget_Newsletter_Form' );
}

add_action( 'widgets_init', 'cc_newsletter_widget_init' );
