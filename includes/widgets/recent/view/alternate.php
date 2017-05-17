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

    <div class="tyche-recent-post-alternate-widget">
        <div class="tyche-date">
			<?php echo '<span class="day">' . esc_html( get_the_date( 'd', absint( get_the_ID() ) ) ) . '</span> <span class="month">' . esc_html( get_the_date( 'M', absint( get_the_ID() ) ) ) . '</span>' ?>
        </div>
        <div class="tyche-image">
            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
				<?php
				$image = '<img class="attachment-tyche-recent-post-list-image size-tyche-recent-post-list-image wp-post-image" src="' . get_template_directory_uri() . '/assets/images/image-placeholder-160x90.jpg' . '" width="160px" 
	height="90px" />';

				if ( has_post_thumbnail() ) {
					$image = get_the_post_thumbnail( get_the_ID(), 'tyche-recent-post-alternate-image' );
				}
				echo $image
				?>
            </a>
        </div>
        <div class="tyche-post-content">
            <p>
                <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo wp_trim_words( wp_kses_post( get_the_title() ), 5 ); ?></a>
            </p>
			<?php echo Tyche_Companion_Helper::get_post_meta_without_date( get_the_ID() ); ?>
        </div>
    </div>

<?php endwhile; ?>
