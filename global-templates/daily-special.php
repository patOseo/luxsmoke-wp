<?php if(get_field('special', 'option')): 
	$special = get_field('special', 'option');
	$between = $special['show_between'];
	date_default_timezone_set('America/Toronto');

	// Get current timestamp and set it to today's date
    $current_timestamp = time();
    $current_date = date('Y-m-d');
    $current_datetime = date_create($current_date . ' ' . date('H:i', $current_timestamp));

	// Get start and end timestamps
    $start_timestamp = strtotime($between['start']);
    $end_timestamp = strtotime($between['end']);

    // If end time is earlier than start time, adjust end time to be on the next day
    if ($end_timestamp < $start_timestamp) {
        $end_datetime = date_create($current_date . ' ' . date('H:i', $end_timestamp));
        $end_datetime->modify('+1 day'); // Adjust end time to be on the next day
    } else {
        $end_datetime = date_create($current_date . ' ' . date('H:i', $end_timestamp));
    }

    // Convert timestamps to date objects for comparison
    $start_datetime = date_create($current_date . ' ' . date('H:i', $start_timestamp));

	if($current_datetime >= $start_datetime && $current_datetime <= $end_datetime):
?>
<div class="text-white mt-5 px-3 px-lg-0">
	<div class="container daily-special rounded-5 px-5 py-5 border border-1">
			<div class="row align-items-center h-100">
				<div class="col-md-8 mb-3 mb-md-0">
				<p class="heading mb-2"><?= $special['small_heading']; ?></p>
					<p class="h3 mb-3"><?= $special['heading']; ?></p>
					<?= $special['details']; ?>
				</div>
				<div class="col-md-4 text-md-end">
					<a class="btn btn-outline-light rounded-pill fw-normal ms-2 px-3 px-lg-5 py-2" href="<?php echo esc_url($special['button_link']); ?>"><?= $special['button_text']; ?></a>
				</div>
			</div>
	</div>
</div>
<?php endif; 
endif;