<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Syndash - Bootstrap4 Admin Template</title>
	<!--favicon-->
	<link rel="icon" href="{{asset('assets')}}/assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="{{asset('assets')}}/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('assets')}}/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/assets/css/app.css" />
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										<img src="{{asset('assets')}}/assets/images/logo-icon.png" width="80" alt="">
										<h3 class="mt-4 font-weight-bold">Welcome</h3>
									</div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
									<div class="form-group mt-4">
										<label>Email Address</label>
										<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email address" />
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" />
									</div>
									<div class="btn-group mt-3 w-100">
										<button type="submit" class="btn btn-primary btn-block">Log In</button>
										{{-- <button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i> --}}
										</button>
									</div>
                                    </form>
								</div>
							</div>
							<div class="col-lg-6">
								<img src="{{asset('assets')}}/assets/images/login-images/login-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>
