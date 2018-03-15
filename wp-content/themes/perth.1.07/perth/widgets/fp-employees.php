<?php

class Perth_Employees extends WP_Widget {

    function perth_employees() {
		$widget_ops = array('classname' => 'perth_employees_widget', 'description' => __( 'Display your team members in a stylish way.', 'perth') );
        parent::__construct(false, $name = __('Perth FP: Employees', 'perth'), $widget_ops);
		$this->alt_option_name = 'perth_employees_widget';	
    }

	function form($instance) {
		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    		= isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$category  		= isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$see_all   		= isset( $instance['see_all'] ) ? esc_url_raw( $instance['see_all'] ) : '';	
		$see_all_text  	= isset( $instance['see_all_text'] ) ? esc_html( $instance['see_all_text'] ) : '';		
	?>

	<p><?php _e('In order to display this widget, you must first add some employees from the dashboard. Add as many as you want and the theme will automatically display them all.', 'perth'); ?></p>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'perth'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of employees to show (-1 shows all of them):', 'perth' ); ?></label>
	<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <p><label for="<?php echo $this->get_field_id('see_all'); ?>"><?php _e('Enter an URL here if you want to section to link somewhere.', 'perth'); ?></label>
	<input class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'see_all' ); ?>" name="<?php echo $this->get_field_name( 'see_all' ); ?>" type="text" value="<?php echo $see_all; ?>" size="3" /></p>	
    <p><label for="<?php echo $this->get_field_id('see_all_text'); ?>"><?php _e('The text for the button [Defaults to <em>See all our employees</em> if left empty]', 'perth'); ?></label>
	<input class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'see_all_text' ); ?>" name="<?php echo $this->get_field_name( 'see_all_text' ); ?>" type="text" value="<?php echo $see_all_text; ?>" size="3" /></p>			
	<p><label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Enter the slug for your category or leave empty to show all employees.', 'perth' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo $category; ?>" size="3" /></p>
	
	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);		
		$instance['see_all'] = esc_url_raw( $new_instance['see_all'] );
		$instance['see_all_text'] 	= strip_tags($new_instance['see_all_text']);			
		$instance['category'] = strip_tags($new_instance['category']);

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['perth_employees']) )
			delete_option('perth_employees');		  
		  
		return $instance;
	}
	
	function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'perth_employees', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		$title 			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$see_all 		= isset( $instance['see_all'] ) ? esc_url($instance['see_all']) : '';
		$see_all_text 	= isset( $instance['see_all_text'] ) ? esc_html($instance['see_all_text']) : '';		
		$number 		= ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : -1;
		if ( ! $number )
			$number = -1;			
		$category 		= isset( $instance['category'] ) ? esc_attr($instance['category']) : '';

		$r = new WP_Query(array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type' 		  => 'employees',
			'posts_per_page'	  => $number,
			'category_name'		  => $category			
		) );

		echo $args['before_widget'];

		if ($r->have_posts()) :
?>

		<?php if ( $title ) echo $before_title . $title . $after_title; ?>

		<div class="employee-area clearfix">
			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<?php //Get the custom field values
					$position = get_post_meta( get_the_ID(), 'wpcf-position', true );
					$facebook = get_post_meta( get_the_ID(), 'wpcf-facebook', true );
					$twitter  = get_post_meta( get_the_ID(), 'wpcf-twitter', true );
					$google   = get_post_meta( get_the_ID(), 'wpcf-google-plus', true );
					$link     = get_post_meta( get_the_ID(), 'wpcf-custom-link', true );
				?>
			<div class="employee">
				<?php if ( has_post_thumbnail() ) : ?>
				<div class="employee-photo">
					<?php the_post_thumbnail('perth-medium-thumb'); ?>
				</div>
				<?php endif; ?>
				<h4 class="employee-name">
			        <?php if ($link == '') : ?>
			        	<?php the_title(); ?>
			        <?php else : ?>
			        	<a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a>
			        <?php endif; ?>					
				</h4>
				<div class="employee-position"><?php echo esc_html($position); ?></div>								
				<div class="employee-social">
					<?php if ($facebook != '') : ?>
					<div class="svg-container employee-svg">
						<?php perth_svg_1(); ?>
						<a class="facebook" href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
					</div>	
					<?php endif; ?>
					<?php if ($twitter != '') : ?>
					<div class="svg-container employee-svg">
						<?php perth_svg_1(); ?>
						<a class="twitter" href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
					</div>	
					<?php endif; ?>
					<?php if ($google != '') : ?>
					<div class="svg-container employee-svg">
						<?php perth_svg_1(); ?>			
						<a href="<?php echo esc_url($google); ?>"><i class="fa fa-google-plus"></i></a>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<?php endwhile; ?>
		</div>

		<?php if ($see_all != '') : ?>
			<a href="<?php echo esc_url($see_all); ?>" class="button more-button">
				<?php if ($see_all_text) : ?>
					<?php echo $see_all_text; ?>
				<?php else : ?>
					<?php echo __('See all our employees', 'perth'); ?>
				<?php endif; ?>
			</a>
		<?php endif; ?>	
	
	<?php
		wp_reset_postdata();

		endif;

		echo $args['after_widget'];

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'perth_employees', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}
	
}