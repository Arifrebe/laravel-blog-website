<!doctype html>
<html lang="en">
  <head>
  	<title>Blogku | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('auth-asset/css/style.css') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Blogku</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url( {{ asset('auth-asset/images/bg-1.jpg') }} );"></div>
						<div class="login-wrap p-4 p-md-5">
							<div class="w-100">
								<h3 class="mb-4">Sign In</h3>
								@if ($errors->any())
									<div class="alert alert-danger p-1 mb-4">
										<ol>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ol>
									</div>
								@endif
							</div>
							<form action="{{ route('login') }}" method="POST" class="signin-form">
								@csrf
								<div class="form-group mt-3">
									<input type="text" class="form-control" value="{{ Session::get('username') }}" name="username" required>
									<label class="form-control-placeholder" for="username">Username</label>
								</div>
								<div class="form-group mt-4">
									<input id="password-field" type="password" value="{{ Session::get('password') }}" name="password" class="form-control" required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
								</div>
								
		          			</form>
							<p class="text-center">Belum punya akun? <a href="{{ route('register-blade') }}">Register</a></p>
		        		</div>
		      		</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('auth-asset/js/jquery.min.js') }}"></script>
  <script src="{{ asset('auth-asset/js/popper.js') }}"></script>
  <script src="{{ asset('auth-asset/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('auth-asset/js/main.js') }}"></script>

	</body>
</html>

