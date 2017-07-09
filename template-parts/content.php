<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hiji
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<div class="col-md-5">
				<?php
				if ( is_home() ){
					if ( has_post_thumbnail()  ) {
						the_post_thumbnail();
					}
				} else {
						if ( !is_page() ) {
							if ( has_post_thumbnail()  ) {
								the_post_thumbnail();
							} else { ?>
								<img src="http://lorempixel.com/300/300/" alt="<?php the_title(); ?>">
							<?php }
							 }
						}
					 ?>
			</div>
			<div class="col-md-7">
				<header class="entry-header">
					<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
						endif;

						if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php
							hiji_posted_on();
							?>
							<br>
							<!-- <p>by: <?php the_author(); ?></p> -->
							<p>in: <?php the_category(' | '); ?></p>
						</div><!-- .entry-meta -->
						<?php
					endif; ?>
				</header><!-- .entry-header -->
			</div>

			<div class="col-md-12">
				<div class="article-content">
					<div class="entry-content text-justify <?php echo ( !is_home()  ? '' : 'sr-only'); ?>">
						<?php
						/**
						*	Display Excerpt in Home
						*	and content in single page
						*/
						if ( is_single() ) {
							the_content( sprintf(
								/* translators: %s: Name of current post. */
								wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hiji' ), array( 'span' => array( 'class' => array() ) ) ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) );
						} else {
							the_excerpt();
						}

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hiji' ),
								'after'  => '</div>',
								) );
								?>
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php hiji_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
			</div>
		</div>
	</article><!-- #post-## -->
