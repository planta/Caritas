<?php
/**
 * Displays the donation summary.
 *
 * Override this template by copying it to yourtheme/charitable/donation-receipt/summary.php
 *
 * @author  Studio 164a
 * @package Charitable/Templates/Donation Receipt
 * @since   1.0.0
 * @version 1.4.7
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* @var Charitable_Donation */
$donation = $view_args['donation'];
$amount   = $donation->get_total_donation_amount();

?>
<dl class="donation-summary row">
	<dt class="col-sm-3 donation-id"><?php esc_html_e( 'Donation Number:', 'humane' ) ?></dt>
	<dd class="col-sm-3 donation-summary-value"><?php echo esc_html( $donation->get_number() ) ?></dd>
	<dt class="col-sm-3 donation-date"><?php esc_html_e( 'Date:', 'humane' ) ?></dt>
	<dd class="col-sm-3 donation-summary-value"><?php echo esc_html( $donation->get_date() ) ?></dd>
	<dt class="col-sm-3 donation-total"> <?php esc_html_e( 'Total:', 'humane' ) ?></dt>
	<dd class="col-sm-3 donation-summary-value"><?php
		/**
		 * Filter the total donation amount.
		 *
		 * @since  1.5.0
		 *
		 * @param  string              $amount   The default amount to display.
		 * @param  float               $total    The total, unformatted.
		 * @param  Charitable_Donation $donation The Donation object.
		 * @param  string              $context  The context in which this is being shown.
		 * @return string
		 */
		echo apply_filters( 'charitable_donation_receipt_donation_amount', charitable_format_money( $amount ), $amount, $donation, 'summary' )
	?></dd>
	<dt class="col-sm-3 donation-method"><?php esc_html_e( 'Payment Method:', 'humane' ) ?></dt>
	<dd class="col-sm-3 donation-summary-value"><?php echo esc_html( $donation->get_gateway_label() ) ?></dd>
</dl>

