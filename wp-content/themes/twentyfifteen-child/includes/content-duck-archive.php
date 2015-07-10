<?php
/**
 */


?>


	<header class="entry-header">
		
		<h2 class="p20">This seasons ducks</h2>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<table class="lineup">

			<thead>

				<tr>
					<th class="pic"></th>
					<th class="name">Duck</th>
					<th class="desc">Bio</th>
				</tr>

			</thead>

			<tbody>
			<?php while ( have_posts() ) : the_post(); ?>

				<tr>

					<td>		
						<?php 
							if ( has_post_thumbnail() ) : 
								the_post_thumbnail('duck-thumb');
							endif; ?>
					</td>

					<td class="name"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></td>

					<td><?php the_content(); ?></td>
									
				</tr>

			<?php
			// End the loop.
			endwhile; ?>
			</tbody>

		</table>
		
	</div><!-- .entry-content -->


	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
