<?php
class Test_Widget extends WP_Widget {

  // Widget Constructor
  public function __construct(){
    parent::__construct(
      'test_widget', // Base ID
      esc_html__('Test Widget Title', 'hiji'), // Widget Name
      array(
        'description' => esc_html__('Widget description is here', 'hiji') // Args
      )
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
    echo $args['before_widget'];

    if ( !empty( $instance['title']  ) ) {
      echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
    }

    $section_postsnr = 3;

    /* Query arguments
    ------------------ */
    // Posts in category
    $query_args = array(
      'posts_per_page'		=> absint( $section_postsnr ),
      'post_status'         	=> 'publish',
      'cat'					=> $cat_name,
      'ignore_sticky_posts'	=> 1
    );

    // The Query
    $query_posts = new WP_Query( apply_filters( 'ac_widget_cats_2col_query_filter', $query_args ) );

    if( $query_posts->have_posts()) : while ( $query_posts->have_posts() ) : $query_posts->the_post();

      // The Content
      the_title();
      if ( has_post_thumbnail() ) {
        the_post_thumbnail();
      }

      endwhile;
    endif;

    echo $args['after_widget'];
  }

/**
 * Back-end widget form.
 *
 * @see WP_Widget::form()
 *
 * @param array $instance Previously saved values from database.
 */
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'hiji' );
		?>
		<p>
  		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'hiji' ); ?></label>
  		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

    <p>
      <label for="<?php echo $this->get_field_id( 'category_test' ); ?>"><?php esc_html_e( 'Choose category', 'hiji' ); ?></label>
      <?php

      wp_dropdown_categories( array(

        'orderby'    => 'title',
        'hide_empty' => true,
        'name'       => $this->get_field_name( 'category_test' ),
        'id'         => $this->get_field_id( 'category_test' ),
        'class'      => 'widefat',
        'selected'   => intval($instance['category_test']),

      ) );

      ?>
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
    // processes widget options on save
    $instance = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['category_test'] = absint( $new_instance['category_test'] );

		return $instance;
  }

}
