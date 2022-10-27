<?php

session_start();
// print_r($_SESSION);
if (isset($_SESSION["status"])) {
    header("location:../homepage");
}
?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="../">
	<meta charset="utf-8" />
	<title>PetSave</title>
	<meta name="description" content="Login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->


	<!--begin::Page Custom Styles(used by this page)-->
	<link href="assets/css/pages/login/classic/login-2.css" rel="stylesheet" type="text/css" />
	<!--end::Page Custom Styles-->

	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!--end::Global Theme Styles-->

	<!--begin::Layout Themes(used by all pages)-->
	<!--end::Layout Themes-->

	<link rel="shortcut icon" href="assets/media/logos/logo.png" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">

	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
			<!--begin::Aside-->
			<div class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10">
				<!--begin: Aside Container-->
				<div class="d-flex flex-row-fluid flex-column justify-content-between">
					<!--begin::Aside body-->
					<div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
						<a href="#" class="mb-15 text-center">
							<img src="assets/media/logos/logo.png" class="max-h-75px" alt="" />
						</a>

						<!--begin::Signin-->
						<div class="login-form login-signin">
							<div class="text-center mb-10 mb-lg-20">
								<h2 class="font-weight-bold">Sign In</h2>
								<p class="text-muted font-weight-bold">Enter your username and password</p>
							</div>

							<!--begin::Form-->
							<form class="form" method="POST" id="frm_login">
								<div class="form-group py-3 m-0">
									<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Username" required name="input[username]" autocomplete="off" />
								</div>
								<div class="form-group py-3 border-top m-0">
									<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Password" placeholder="Password" required name="input[password]"/>
								</div>

								<div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
								</div>

								<div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
									<div class="my-3 mr-2">
										
									</div>
									<button type="submit" id="kt_login_signin_submit" class="btn btn-warning font-weight-bold px-9 py-4 my-3">Sign In</button>
								</div>
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->

						<!--begin::Signup-->
						<div class="login-form login-signup">
							<div class="text-center mb-10 mb-lg-20">
								<h3 class="">Sign Up</h3>
								<p class="text-muted font-weight-bold">Enter your details to create your account</p>
							</div>
						</div>
						<!--end::Signup-->
					</div>
					<!--end::Aside body-->

					<!--begin: Aside footer for desktop-->
					<div class="d-flex flex-column-auto justify-content-between mt-15">
						<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
							&copy; 2022 PetSave
						</div>
					</div>
					<!--end: Aside footer for desktop-->
				</div>
				<!--end: Aside Container-->
			</div>
			<!--begin::Aside-->

			<!--begin::Content-->
			<div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7" style="background-image: url(assets/media/bg/bg-4.png);">
				<!--begin::Content body-->
				<div class="d-flex flex-column-fluid flex-lg-center">
					<div class="d-flex flex-column justify-content-center">
						<h3 class="display-3 font-weight-bold my-7 text-white">Welcome to PetSave!</h3>
						<p class="font-weight-bold font-size-lg text-white opacity-80">
						Our mission is to rescue dogs and cats that have been abandoned, abused, or neglected throughout the Philippines and to make sure that each animal is given "Life with a New Leash"
						</p>
					</div>
				</div>
				<!--end::Content body-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Login-->
	</div>
	<!--end::Main-->


	<script>
		var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
	</script>
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>
	</script>
	<!--end::Global Config-->

	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Theme Bundle-->


	<!--begin::Page Scripts(used by this page)-->
	<script src="assets/js/pages/custom/login/login-general.js"></script>
	<!--end::Page Scripts-->
</body>
<!--end::Body-->
<script type="text/javascript">
	$("#frm_login").submit(function(e) {
        e.preventDefault();
        var url = "controllers/sql.php?c=LoginUser&q=login";
        var data = $("#frm_login").serialize();
        $("#btn_submit").prop('disabled', true);
        $("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span> Verifying ...");
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(data) {
                var json = JSON.parse(data);
                
				if (json.data != 0) {
                    swal.fire({
		                text: "All is cool! Signed in successfully",
		                icon: "success",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						window.location = "homepage";
					});
				} else {
					swal.fire({
		                text: "Login Failed! Your username or password is incorrect. Please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}

                // var json = JSON.parse(data);
                console.log(json.data);

            }
        });


    });
</script>

</html>