<?php
/**
 * View: Day View Time separator
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/views/v2/day/time-separator.php
 *
 * See more documentation about our views templating system.
 *
 * @link {INSERT_ARTCILE_LINK_HERE}
 *
 * @version 4.9.4
 *
 */

use Tribe\Events\Views\V2\Utils;
use Tribe__Date_Utils as Date;

$event = $this->get( 'event' );
$should_have_time_separator = Utils\Separators::should_have_time( $this->get( 'events' ), $event );

if ( ! $should_have_time_separator ) {
	return;
}

$event_start_datetime = strtotime( tribe_get_start_date( $event->ID, true, Tribe__Date_Utils::DBDATETIMEFORMAT ) );
$event_start_hour = strtotime( date( 'Y-m-d H:00:00', $event_start_datetime ) );

// Format to WP format
$separator_text = date( tribe_get_time_format(), $event_start_hour );

?>
<div class="tribe-events-calendar-day__time-separator">
	<time
		class="tribe-events-calendar-day__time-separator-text tribe-common-h7 tribe-common-h--alt"
		datetime="<?php echo esc_attr( tribe_get_start_date( $event->ID, true, 'H:00' ) ); ?>"
	>
		<?php echo esc_html( $separator_text ); ?>
	</time>
</div>
