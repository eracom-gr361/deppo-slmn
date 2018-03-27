<?php

/**
** Ajouter le CSS du theme parent
**/


add_action( 'wp_enqueue_scripts', 'deppo_slmn_enqueue_styles' );

function deppo_slmn_enqueue_styles() {

 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );


 // corrige un bug de Deppo: deppo-font-enqueue

 wp_enqueue_style( 'hkgrotesk-style', get_template_directory_uri() . '/assets/fonts/hk-grotesk/stylesheet.css' );


}


/**
 * Fonction modifiée pour afficher les images d'ACF

 * On utilise ACF pour charger l'image.
 * Le champ s'appelle:
 * image_accueil
 *
 * @since  deppo 1.0
 */

function deppo_slmn_slider_featured_image() {

	if ( has_post_thumbnail() ) :

		?>

			<div class="featured-content featured-image <?php echo esc_attr( deppo_get_featured_image_class() ); ?>">
				<?php

					$display_post_nav = get_theme_mod( 'display-slider-settings', 1 );

					switch ( $display_post_nav ) {
						case 0:
							$classes[] = 'slider-text-side';
							break;
						default:
							$classes[] = 'slider-text-center';
					}

					$url = wp_get_attachment_url( get_post_thumbnail_id( ) );

					$filetype = wp_check_filetype($url);
					if ($filetype['ext'] == 'gif') {
						$thumb_size = '';
					} else {
						$thumb_size = 'full';
					}

					if ( $display_post_nav == 0 ) { ?>
						<a href="<?php the_permalink(); ?>">
					<?php }

						// vérifier si on a une image ACF:
						$acf_image = get_field('image_accueil');

						if( $acf_image ) {

							echo wp_get_attachment_image( $acf_image['id'], $thumb_size );

						} else { 

							the_post_thumbnail($thumb_size);

						}

 					if ( $display_post_nav == 0 ) { ?>
						</a>
					<?php } ?>
			</div>

		<?php

	else :

		return;

	endif;
}
