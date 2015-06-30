<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->


<script type="text/javascript">



function calculate_odds(row) {

	var winnings = 0;
	// Set winnings to 0

  	var odds = $(row).find('.theodds').attr('data-duckodds'),
    // Find the value of the data attribute for the specific td with the class "theodds"

    betting_amount = $(row).find('[name="betting-amount"]').val()
    // Find the value entered into an input field

	winnings = (parseFloat(odds) / 1 + 1) * betting_amount;
	// Work out the winnings based on the odds given. 
	// Divide first number by 1 as all odds are something to 1 for now, then +1
	// Multiply that number by the bet
	// For example Bet 30 on 3/1 odds
	// 3 / 1 = 3 + 1 = 4 * 30 = 120

			 
    $(row).find('.js-winnings').html(winnings.toFixed(2));
    // Show the wiinings amount in the final td in each row     

}


$(document).ready(function() {

	$('.lineup tbody tr').each(function() {

		// Run the function calculate_odds(); so that it calculates for the defaut value when the page has loaded
		calculate_odds();

		$(this).find('[name="betting-amount"]').on('keyup', function() {

			calculate_odds($(this).closest('tr'));

        }).trigger('keyup');
	});

});

</script>

<?php wp_footer(); ?>

</body>
</html>
