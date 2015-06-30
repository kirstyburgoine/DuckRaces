<?php
/**
 */

$race_date = get_field('race_date');
$race_time = get_field('race_time');
$the_ducks = get_field('the_ducks');
$location = get_field('location');

$date = DateTime::createFromFormat('Ymd', get_field('race_date'));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<p class="meta"><strong><?php echo $date->format('l jS F Y'); ?></strong> <br /><?php echo $race_time; ?></p>
		<hr />
		
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
