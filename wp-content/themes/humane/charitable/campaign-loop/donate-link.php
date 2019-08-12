<?php
/**
 * Displays the donate button to be displayed within campaign loops.
 *
 * Override this template by copying it to yourtheme/charitable/campaign-loop/donate-link.php
 *
 * @author  Studio 164a
 * @since   1.0.0
 * @version 1.5.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * @var 	Charitable_Campaign
 */
$campaign = $view_args['campaign'];

if ( ! $campaign->can_receive_donations() ) :
	return;
endif;

?>
<div class="campaign-donation">
	<a class="donate-button button btn btn-border btn-lg" href="<?php echo esc_url( charitable_get_permalink( 'campaign_donation_page', array( 'campaign_id' => $campaign->ID ) ) ) ?>" aria-label="<?php echo esc_attr( sprintf( esc_html_x( 'Make a donation to %s', 'make a donation to campaign', 'humane' ), get_the_title( $campaign->ID ) ) ) ?>"><?php echo( esc_html( humane_cs_get_option( 'donate_button_text', esc_html__( 'Donate', 'humane' ) ) ) ) ?></a>
</div>
