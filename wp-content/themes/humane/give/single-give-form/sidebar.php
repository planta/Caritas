<?php
/**
 * Single Give Form Sidebar
 *
 * Adds a dynamic sidebar to single Give Forms (singular post type for give_forms) - Override this template by copying it to yourtheme/give/single-give-form/sidebar.php
 * 
 * @package     Give
 * @subpackage  Templates/Single-Give-Form
 * @copyright   Copyright (c) 2016, WordImpress
 * @license     https://opensource.org/licenses/gpl-license GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$donation_form_layout = cs_get_option('donation_form_layout');

if ( ! is_active_sidebar( 'give-forms-sidebar' ) ) {
	return;
}
?>

<?php if( $donation_form_layout != 'full_width' ):?>
	<aside id="secondary" class="widget-area <?php echo esc_attr( apply_filters( 'humane_widget_area_class', 'col-md-4' ) ); ?>">
		<?php dynamic_sidebar( 'give-forms-sidebar' ); ?>
	</aside><!-- #secondary -->
<?php endif;?>