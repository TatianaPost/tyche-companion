<?php
/**
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Tyche_Companion
 * @subpackage Tyche_Companion/includes
 */

$posts = Tyche_Companion_Helper::get_posts( $params ); ?>


<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

    <div class="tyche-recent-post-widget">
        <div class="tyche-image">
            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
				<?php
				$image = '<img class="attachment-tyche-recent-post-list-image size-tyche-recent-post-list-image wp-post-image" src="' . get_template_directory_uri() . '/assets/images/image-placeholder-65x65.jpg' . '" width="65px" 
	height="65px" />';

				if ( has_post_thumbnail() ) {
					$image = get_the_post_thumbnail( get_the_ID(), 'tyche-recent-post-list-image' );
				}
				echo $image
				?>
            </a>
        </div>
        <div class="tyche-post-content">
            <div class="tyche-title">
                <p>
                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo wp_trim_words( wp_kses_post( get_the_title() ), 20 ); ?></a>
                </p>
            </div>
        </div>
    </div>

<?php endwhile; ?>
