<?php
/**
 * Template Name: Home
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
			<?php
			// Start the standard loop for the homepage.
			while ( have_posts() ) : the_post();

				// Include the home content template - which is very similar to page
				// in this instance but in the child theme to keep it separate.
				get_template_part( 'includes/content', 'home' );

			// End the loop.
			endwhile;
			?>


		<?php		
		//--------------------------------------------------------------------
		//--------------------------------------------------------------------
		// This is where we want to show the next race based on today's date. 
		//
		// First we find todays date.
		$today = date('Ymd');

		// Then create a new query to compare todays date to the date stored in our custom field
		$upcoming_args = array (
		    'post_type' => 'races',
		    'meta_query' => array(
			     array(
			        'key'		=> 'race_date', // custom field for date
			        'compare'	=> '>=', // greater than or equal to
			        'value'		=> $today // todays date
			    )
		    ),
			'posts_per_page' => 1 // And then set it to only show one post
		);


		// Set a new query rather than using query_posts()
		$upcoming_query = new WP_Query( $upcoming_args );

		// If there is a post show the content area
		if ( $upcoming_query->have_posts() ) : ?>

		<div class="entry-content">

			<h2>Upcoming Race</h2>

			<table class="lineup">

				<thead>

					<tr>
						<th>Race</th>
						<th>Date & Time</th>
					</tr>

				</thead>

				<tbody>

				<?php
				// The Loop for the post
				while ( $upcoming_query->have_posts() ) : $upcoming_query->the_post();
					
					// Get the date and time from our custom fields
					$race_date = get_field('race_date');
					$race_time = get_field('race_time');
					// Format the date field so that we can display it as we would like
					$date = DateTime::createFromFormat('Ymd', get_field('race_date'));
					?>

					<tr>

						<td><a href="<?php the_permalink();?>"><?php the_title(); ?></a></td>
						<td><?php echo $date->format('l jS F Y'); ?><br /><small><?php echo $race_time; ?></small></td>
										
					</tr>

				<?php
				// End the loop and reset the post data so that we don't mess with the main loop.
				endwhile; ?>

				</tbody>

			</table>

		</div>
		<?php 
		endif; wp_reset_postdata(); // ends the upcoming race query ?>

		<?php		
		//--------------------------------------------------------------------
		//--------------------------------------------------------------------
		// This is where we want to show all of the races in the season no matter what the curret date is. 


		// Then create a new query to compare todays date to the date stored in our custom field
		$all_args = array (
		    'post_type' => 'races',
			'posts_per_page' => -1 // And then set it to only show one post
		);


		// The Query
		$all_query = new WP_Query( $all_args ); 

		// If there any races show the content area
		if ( $all_query->have_posts() ) :?>

		<div class="entry-content">

			<h2>Season at a Glance</h2>

			<table>

				<thead>

					<tr>
						<th>Race</th>
						<th>Date & Time</th>
					</tr>

				</thead>

				<tbody>

				<?php
				// The Loop
				while ( $all_query->have_posts() ) : $all_query->the_post();
					
					// Get the date and time from our custom fields
					$race_date = get_field('race_date');
					$race_time = get_field('race_time');
					// Format the date field so that we can display it as we would like
					$date = DateTime::createFromFormat('Ymd', get_field('race_date'));
					?>

					<tr>

						<td><a href="<?php the_permalink();?>"><?php the_title(); ?></a></td>
						<td><?php echo $date->format('l jS F Y'); ?><br /><small><?php echo $race_time; ?></small></td>
										
					</tr>

				<?php
				// End the loop and reset the post data so that we don't mess with the main loop.
				endwhile; wp_reset_postdata(); ?>

				</tbody>

			</table>

		</div>

		<?php 
		endif; wp_reset_postdata(); ?>

		</article>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
