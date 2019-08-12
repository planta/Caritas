<?php
/**
 * Displays the logged in message.
 *
 * Override this template by copying it to yourtheme/charitable/shortcodes/logged-in.php
 *
 * @author  Studio 164a
 * @package Charitable/Templates/Account
 * @since   1.0.0
 * @version 1.5.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$message = isset( $view_args['logged_in_message'] )
	? $view_args['logged_in_message']
	: esc_html__( 'You are already logged in!', 'humane' );

echo wpautop( $message );

?>
<a href="<?php echo wp_logout_url( charitable_get_current_url() ) ?>"><?php esc_html_e( 'Logout.', 'humane' ) ?></a>
