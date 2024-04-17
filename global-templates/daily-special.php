<?php if(get_field('special', 'option')): 
	$special = get_field('special', 'option');
	$between = $special['show_between'];
	date_default_timezone_set('America/Toronto');

	$current_t = date('H:i:s');
	$start_t = $between['start'];
	$end_t = $between['end'];

	$show_special = false;

	if($start_t > $end_t) {
		if($current_t >= $start_t || $current_t <= $end_t) {
			$show_special = true;
		}
	} elseif($start_t < $end_t) {
		if($current_t >= $start_t && $current_t <= $end_t) {
			$show_special = true;
		}
	} elseif($start_t == $end_t) {
		$show_special = true;
	} else {
		$show_special = false;
	}

	if($show_special):
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