<?php
/**
 * Displays the checkbox to allow donors to opt in to the newsletter on the donation form.
 *
 * Override this template by copying it to yourtheme/charitable/charitable-newsletter-connect/donation-form-field.php
 *
 * @author  Studio 164a
 * @package Charitable Newsletter Connect/Templates/Donation Form
 * @since   1.0.0
 * @version 1.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( 'automatic' == $view_args['mode'] ) :

?>	
	<input type="hidden" name="newsletter_opt_in" value="1" />
<?php

else :

	$ticked = array_key_exists( 'newsletter_opt_in', $_POST ) ? $_POST['newsletter_opt_in'] : 'opt-in-checked' == $view_args['mode'];

?>
	<div id="charitable_field_newsletter_opt_in" class="charitable-form-field charitable-form-field-checkbox">
		<label for="charitable_field_newsletter_opt_in">
			<input type="checkbox" name="newsletter_opt_in" value="1" <?php checked( $ticked ) ?> />
			<?php echo esc_html($view_args['label']) ?>
		</label>
	</div>
<?php

endif;
