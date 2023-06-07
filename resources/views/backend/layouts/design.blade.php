<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from yashdesigns.net/resido-live-new/resido/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 05:18:39 GMT -->
<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
        <title>Admin Fingers :: @yield('title')  </title>
		
        <!-- Custom CSS -->
        <link href="{{asset('/assets/css/styles.css')}}" rel="stylesheet">

		<!-- Custom Color Option -->
		<link href="{{asset('/assets/css/colors.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/css/plugins/css/boxicons.min.css')}}" rel="stylesheet">
		@yield('extra_css')
    </head>
	
    <body class="blue-skin dashboard">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			@include('backend.layouts.header')
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			@yield('content')
			
			<!-- ============================ Footer Start ================================== -->
			@include('backend.layouts.footer')
			<!-- ============================ Footer End ================================== -->
			
			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="registermodal">
						<span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Log In</h4>
							<div class="login-form">
								<form>
								
									<div class="form-group">
										<label>User Name</label>
										<div class="input-with-icon">
											<input type="text" class="form-control" placeholder="Username">
											<i class="ti-user"></i>
										</div>
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<div class="input-with-icon">
											<input type="password" class="form-control" placeholder="*******">
											<i class="ti-unlock"></i>
										</div>
									</div>
									
									<div class="form-group">
										<button type="submit" class="btn btn-md full-width btn-theme-light-2 rounded">Login</button>
									</div>
								
								</form>
							</div>
							<div class="modal-divider"><span>Or login via</span></div>
							<div class="social-login mb-3">
								<ul>
									<li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google+</a></li>
								</ul>
							</div>
							<div class="text-center">
								<p class="mt-5"><a href="#" class="link">Forgot password?</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<!-- Sign Up Modal -->
			<div class="modal fade signup" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="sign-up">
						<span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Sign Up</h4>
							<div class="login-form">
								<form>
									
									<div class="row">
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="Full Name">
													<i class="ti-user"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="email" class="form-control" placeholder="Email">
													<i class="ti-email"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="Username">
													<i class="ti-user"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="password" class="form-control" placeholder="*******">
													<i class="ti-unlock"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="password" class="form-control" placeholder="123 546 5847">
													<i class="lni-phone-handset"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<select class="form-control">
														<option>As a Customer</option>
														<option>As a Agent</option>
														<option>As a Agency</option>
													</select>
													<i class="ti-briefcase"></i>
												</div>
											</div>
										</div>
										
									</div>
									
									<div class="form-group">
										<button type="submit" class="btn btn-md full-width btn-theme-light-2 rounded">Sign Up</button>
									</div>
								
								</form>
							</div>
							<div class="modal-divider"><span>Or login via</span></div>
							<div class="social-login mb-3">
								<ul>
									<li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google+</a></li>
								</ul>
							</div>
							<div class="text-center">
								<p class="mt-5"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#" class="link">Go For LogIn</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->

            
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->


		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('/assets/js/popper.min.js')}}"></script>
		<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('/assets/js/rangeslider.js')}}"></script>
		<script src="{{asset('/assets/js/select2.min.js')}}"></script>
		<script src="{{asset('/assets/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('/assets/js/slick.js')}}"></script>
		<script src="{{asset('/assets/js/slider-bg.js')}}"></script>
		<script src="{{asset('/assets/js/lightbox.js')}}"></script> 
		<script src="{{asset('/assets/js/imagesloaded.js')}}"></script>
        <script src="{{asset('/assets/js/custom.js')}}"></script>
		 
		<script src="{{asset('/assets/js/tinymce/tinymce.min.js')}}"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		
		<script>
			function openFilterSearch() {
				document.getElementById("filter_search").style.display = "block";
			}
			function closeFilterSearch() {
				document.getElementById("filter_search").style.display = "none";
			}
		</script>
		
		<script>
			  $(document).ready(function(){
				$("#showbutton").click(function(){
				$("#showing").slideToggle("slow");
			  });
			  });
		</script>
        @yield('extra_js')
	</body>

<!-- Mirrored from yashdesigns.net/resido-live-new/resido/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 05:18:40 GMT -->
</html>