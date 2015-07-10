<?php
/**
 * The template for displaying the ducks
 *
 * Used to display the custom post type for ducks in different format to the standard archivea
 *
 */

get_header();
query_posts( $query_string . '&posts_per_page=-1&orderby=title&order=ASC' ); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">The Ducks</h1>
				<div class="taxonomy-description">All of the ducks racing this season.</div>
				
			</header><!-- .page-header -->

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
			// Start the Loop inside content-duck-archive so we can loop through the ducks in a table.
			


				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'includes/content', 'duck-archive' );



			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) ); ?>

			</article>
		<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
