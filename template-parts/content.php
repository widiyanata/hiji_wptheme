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
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} else {
			if ( !is_page() ) {?>
				<img src="http://lorempixel.com/300/300/" alt="<?php the_title(); ?>">
		<?php }
		} ?>
		<div class="article-content">
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php hiji_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content text-justify">
				<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hiji' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

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

	</article><!-- #post-## -->
