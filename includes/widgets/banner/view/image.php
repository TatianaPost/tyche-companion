<?php
/**
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Tyche_Companion
 * @subpackage Tyche_Companion/includes
 */

// If the image is not set, terminate here
if ( empty( $params['image'] ) ) {
	return false;
}
?>

<div class="row">
    <div class="col-xs-12 tyche-image-banner">
		<?php echo ( ! empty( $params['image_url'] ) ) ? '<a href="' . esc_url( $params['image_url'] ) . '">' : '' ?>
        <img src="<?php echo esc_url( $params['image'] ) ?>"/>
		<?php echo ( ! empty( $params['image_url'] ) ) ? '</a>' : '' ?>
    </div>
</div>
