<?php
/**
 * Template part for displaying Content-Slider:

 * Note: 
 * La seule chose qui change ici, c'est l'appel à la fonction :
 * deppo_slmn_slider_featured_image()
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package deppo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="slider-item-wrapper">

		<?php 

		if (function_exists('get_field')) {

			deppo_slmn_slider_featured_image();

		} else {

			deppo_slider_featured_image();

		}

		 ?>

		<header class="entry-header">
			<?php

			$title  = the_title('','',false);
			$title_length = strlen( $title );
			$length_class = 'xtra-long';

			if ( $title_length < 10 ) {
				$length_class = 'short';
			} else if ( $title_length < 18 ) {
				$length_class = 'medium';
			} else if ( $title_length < 26 ) {
				$length_class = 'long';
			} else {
				$length_class = 'xtra-long';
			}

			the_title( '<h2 class="entry-title ' . $length_class . '"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '<span class="arrow-wrapper"><i class="right-arrow"></i></span></a></h2>' );
			?>
		</header><!-- .entry-header -->

		<div class="view-post-link">
			<a href="<?php the_permalink(); ?>">
				<?php echo esc_html__('View', 'deppo') ?>
				<span class="arrow-wrapper"><i class="right-arrow"></i></span>
			</a>
		</div>
	</div>
</article><!-- #post-## -->
