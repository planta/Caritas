<?php
/**
 * Displays the donate button to be displayed within campaign loops.
 *
 * Override this template by copying it to yourtheme/charitable/campaign-loop/more-link.php
 *
 * @author  Studio 164a
 * @package Charitable/Templates/Campaign
 * @since   1.2.3
 * @version 1.5.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* @var Charitable_Campaign */
$campaign = $view_args['campaign'];

?>
<p><a class="button btn btn-border btn-lg" href="<?php echo esc_url( get_permalink( $campaign->ID ) ) ?>" aria-label="<?php echo esc_attr( sprintf( esc_html_x( 'Continue reading about %s', 'Continue reading about campaign', 'humane' ), get_the_title( $campaign->ID ) ) ) ?>"><?php echo esc_html( humane_cs_get_option( 'donate_button_text_expired', esc_html__( 'Details', 'humane' ) ) ); ?></a></p>