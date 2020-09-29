<?php
class WP_Widget_Follow extends WP_Widget {
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'follow-us',
			'description' => 'Display the social media widget. Slack, Facebook, Twitter, Medium',
		);
		$control_ops = array();
		parent::__construct( 'follow-us', 'Follow us', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		echo '<div class="widget follow-us">';
		if ( ! empty( $instance['title'] ) ) {
			echo '<h4 class="widget-title">' . esc_attr( $instance['title'] ) . '</h4>';
		}
		echo '<div class="widget-content">';
    echo '<div class="follow-icons">';
    if (!empty($instance['slack'])) {
      echo '<a href="'.$instance['slack'].'" class="social slack is-black"><i class="icon slack"></i></a>';
    }
    if (!empty($instance['facebook'])) {
      echo '<a href="'.$instance['facebook'].'" class="social facebook is-black"><i class="icon facebook"></i></a>';
    }
    if (!empty($instance['twitter'])) {
      echo '<a href="'.$instance['twitter'].'" class="social twitter is-black"><i class="icon twitter"></i></a>';
    }
    if (!empty($instance['medium'])) {
      echo '<a href="'.$instance['medium'].'" class="social medium is-black"><i class="icon medium"></i></a>';
    }
		if (!empty($instance['mail'])) {
      echo '<a href="mailto:'.$instance['mail'].'" class="social mail is-black"><i class="icon envelope"></i></a>';
    }
    echo '</div>';
		echo '</div>';
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		extract( $instance );
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'slack' ) . '">Slack URL: <input type="text" name="' . $this->get_field_name( 'slack' ) . '" id="' . $this->get_field_id( 'slack' ) . '" value="' . $instance['slack'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'facebook' ) . '">Facebook URL: <input type="text" name="' . $this->get_field_name( 'facebook' ) . '" id="' . $this->get_field_id( 'facebook' ) . '" value="' . $instance['facebook'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'twitter' ) . '">Twitter URL: <input type="text" name="' . $this->get_field_name( 'twitter' ) . '" id="' . $this->get_field_id( 'twitter' ) . '" value="' . $instance['twitter'] . '" class="widefat" /></label></p>';
    echo '<p><label for="' . $this->get_field_id( 'medium' ) . '">Medium URL: <input type="text" name="' . $this->get_field_name( 'medium' ) . '" id="' . $this->get_field_id( 'medium' ) . '" value="' . $instance['medium'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'mail' ) . '">Email: <input type="text" name="' . $this->get_field_name( 'mail' ) . '" id="' . $this->get_field_id( 'mail' ) . '" value="' . $instance['mail'] . '" class="widefat" /></label></p>';

	}
}

function og_follow_widget_init() {
	register_widget( 'WP_Widget_Follow' );
}

add_action( 'widgets_init', 'og_follow_widget_init' );
