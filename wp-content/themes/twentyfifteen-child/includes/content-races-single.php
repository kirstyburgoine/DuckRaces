<?php
/**
 * Displays all content for each single duck race 
 */
$race_date = get_field('race_date');
$race_time = get_field('race_time');
$the_ducks = get_field('the_ducks');
$location = get_field('location');

$date = DateTime::createFromFormat('Ymd', get_field('race_date'));


?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<p class="meta"><strong><?php echo $date->format('l jS F Y'); ?></strong> <br />
		<?php echo $race_time; ?></p>
		<hr />

		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );


		if ( have_rows('the_ducks') ) : ?>

		<h2>The ducks in the race</h2>

		<table class="lineup">

			<thead>

				<tr>
					<th class="pic"></th>
					<th class="name">The Duck</th>
					<th class="odds">Odds</th>
					<th class="money">How much do you want to bet? (£)</th>
					<th class="winnings">Potential Winnings</th>
				</tr>

			</thead>

			<tbody>
			<?php
				while ( have_rows('the_ducks') ): the_row(); 


					$ducks = get_sub_field('duck');
					$odds = get_sub_field('odds'); 

					//var_dump( $duck_lineup );

					

					if ( $ducks ) :

						$post = $ducks; 
						setup_postdata( $post ); ?>

						<tr>

							<td class="pic">		
							<?php 
							if ( has_post_thumbnail() ) : 
								the_post_thumbnail('duck-thumb');
							endif; ?></td>

							<td class="name"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></td>
							
							<td data-duckodds="<?php echo $odds; ?>" id="theodds" class="theodds"><?php echo $odds; ?> / 1</td>
							
							<td class="money">&pound;<input type="text" name="betting-amount" value="10"></td>

							<td class="winnings">&pound; <span class="js-winnings"></span></td>

						</tr>


					<?php 	
						wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 

					endif;
										
				endwhile; ?>

			</tbody>

		</table>
		
			<?php
			endif;

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
