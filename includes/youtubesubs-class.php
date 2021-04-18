<?php

/**
 * Adds Foo_Widget widget.
 */
class dsm_youtube_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'dsm_youtube_widget', // Base ID
			esc_html__( 'Youtube Subs', 'dsm_domain' ), // Name
			array( 'description' => esc_html__( 'Youtube Subs Widget', 'dsm_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; // Display before widget

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

        //Widget Content Output
		echo '<div class="g-ytsubscribe" data-channel="'.$instance['channel'].'" data-layout="'.$instance['layout'].'" data-count="'.$instance['subcount'].'"></div>';

		echo $args['after_widget']; // Display after widget
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'dsm_domain' );
	
		$channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'Youtube Channel Name', 'dsm_domain' );
		
        $layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'Change Layout Type', 'dsm_domain' );
        
        $subcount = ! empty( $instance['subcount'] ) ? $instance['subcount'] : esc_html__( 'default', 'dsm_domain' );
		?>

        <!--Displays the title-->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'dsm_domain' ); ?></label> 
		    <input class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>">
		</p>
        
        <!--Channel-->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>"><?php esc_attr_e( 'Channel:', 'dsm_domain' ); ?></label> 
		    <input class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $channel ); ?>">
		</p>

        <!--Layout-->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_attr_e( 'Layout:', 'dsm_domain' ); ?></label> 
		    
            <select class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
                <option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>
                    Default
                </option>
                <option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>
                    Full
                </option>
            </select>

		</p>
        
        <!--subcount-->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'subcount' ) ); ?>"><?php esc_attr_e( 'Display Subs:', 'dsm_domain' ); ?></label> 
		    
            <select class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'subcount' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'subcount' ) ); ?>">
                <option value="default" <?php echo ($subcount == 'default') ? 'selected' : ''; ?>>
                    Default
                </option>
                <option value="hidden" <?php echo ($subcount == 'hidden') ? 'selected' : ''; ?>>
                    Hidden
                </option>
            </select>

		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';
		$instance['subcount'] = ( ! empty( $new_instance['subcount'] ) ) ? sanitize_text_field( $new_instance['subcount'] ) : '';

		return $instance;
	}

} // class Foo_Widget