<?php if(!isset($_COOKIE['ageverification'])): ?>
<div id="age-verify" class="overflow-auto smoke-bg fade">
	<div class="container h-100">
		<div class="row h-100 justify-content-center align-items-center">
			<div class="col-lg-6">
				<div class="age-verify-content text-white">
				<img class="mb-6" alt="Lux Smoke Logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/luxsmoke-logo-alpha-shadow.svg" width="250">
					<p class="h2 mb-3 text-white">You must be 19+ to enter the website</p>
					<p class="heading my-6">Are you 19 years of age or older?</p>
					<div class="mb-3 btn-group text-white w-100">
						<button class="d-inline btn btn-outline-light rounded-pill fw-400 btn-md mx-1" id="btnDecline">No</button>
						<button class="d-inline btn btn-outline-light rounded-pill fw-400 btn-md mx-1" id="btnAccept">Yes</button>
					</div>
					<p class="mb-5 text-muted"><small>By clicking "yes", you are confirming that you are of legal age to purchase cannabis</small></p>
					<div class="alert alert-danger rounded-pill fade" id="verifyNotice">
						<p class="mb-0">You must be 19+ to enter the website</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	// Age Verifier
let expiryDate = new Date();
const month = (expiryDate.getMonth() + 1) % 12;
expiryDate.setMonth(month);
function acceptCookie() {
    document.body.classList.remove("verify");
    document.cookie = "ageverification=1; max-age =" + 2 * 24 * 60 * 60 + "; path=/", document.getElementById("age-verify").classList.toggle("show");
	setTimeout(function () {
        document.getElementById("age-verify").style.visibility="hidden";
    }, 100);
	
}
document.getElementById("btnAccept").addEventListener("click", acceptCookie);
document.getElementById("btnDecline").addEventListener("click", function () {
    document.getElementById("verifyNotice").classList.add("show");
});
// Check if the "ageverification" cookie is not present
if (document.cookie.indexOf("ageverification") < 0) {
    // Delay the addition of the "show" class by 2 seconds
    setTimeout(function () {
        document.body.classList.add("verify");
        document.getElementById("age-verify").classList.add("show");
    }, 1000);
} else { // Otherwise, hide the age verifier
    document.getElementById("age-verify").style.visibility="hidden";
}
</script>
<?php endif;
