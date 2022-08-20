<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coolmat
 */

get_header();
?>

	<main id="primary" class="site-main">
	
	<!-- our hero element -->

	<!-- query to select single post -->

	<?php query_posts('posts_per_page=1&category_name=menu&orderby=rand'); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div class="hero">
			<div class="hero-inner container">
				<h1 class="hero-text lowercase">
					<span class="hero-sitename"><?php bloginfo('name'); ?></span> <?php the_title(); ?>
				</h1>
				<p class="hero-description lowercase"><span class="magenta"><?php bloginfo('name'); ?></span> <?php bloginfo('description'); ?>.</p>
			</div>
		</div>

	<?php		
		endwhile; // End while
		endif; // End if
	?>

	

	<!-- our intro element -->
	<div class="intro" id="intro">
		<div class="intro-inner">
			<h2 class="intro-title">Introducing <?php bloginfo('name'); ?></h2>
			<p class="intro-description">
				street food that was born in tough times.<br>
				street food that everybody loves.<br>
				<span class="yellow"><?php bloginfo('name'); ?></span> is on a mission to provide future 
				flavor nostalgia of street food for men,<br>
				women, children, grandpas and grandmas.<br>
				we only use the best ingredients.
			</p>
		</div>
	</div>

	<div class="section-heading" id="food">Menu</div>

	<div class="grid">
		<?php
		query_posts('posts_per_page=20&category_name=menu');
		if ( have_posts() ) :
			/* Start the Loop */
			$item_number = 1;
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
				$item_number++;
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>

	<div class="section-heading" id="locations">
		Directions to cool mat
	</div>

	<div class="locations">

		<!-- each individual location -->
		<div class="location grid">
			<!-- our map on the left -->
			<div class="map">
				<div class="map-inner">
					<!-- our map embed goes in here -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.9531939287576!2d126.86218631571357!3d37.55616653247893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9c03c38738ad%3A0x1eff909f2c04315c!2s284-10%20Yeomchang-dong%2C%20Gangseo-gu%2C%20Seoul%2C%20South%20Korea!5e0!3m2!1sen!2sin!4v1660603830226!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
			<!-- our address on the right -->
			<div class="location-info">
				<div class="location-description">
					<!-- our location info goes in here -->
					<h3>Business Name</h3>
					<p>cool mat</p>

					<h3>Address</h3>
					<p>284-10 Yeomchang-dong, Gangseo-gu, Seoul</p>

					<h3>Phone Number</h3>
					<p>02-9999-9999</p>

					<h3>Direction</h3>
					<p>Get out of gate 3 and walk straight down for about
					200 meters. You will see Cool Mat on your left.</p>
				</div>
			</div>
		</div>

	</div>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
