<!doctype html>
<html lang="en">
  <head>
  	<title>Login 05</title>
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
								<h3 class="mb-4">Register</h3>
							</div>
							@if ($errors->any())
								<div class="alert alert-danger p-1 mb-4">
									<ol>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ol>
								</div>
							@endif
							<form action="{{ route('register') }}" method="POST" class="signin-form">
								@csrf
								<div class="form-group mt-3">
									<input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
									<label class="form-control-placeholder" for="name">Name</label>
								</div>
								<div class="form-group mt-4">
									<input type="text" class="form-control" value="{{ old('username') }}" name="username" required>
									<label class="form-control-placeholder" for="username">Username</label>
								</div>
								<div class="form-group mt-4">
									<input type="email" class="form-control" value="{{ old('email') }}" name="email" required>
									<label class="form-control-placeholder" for="email">Email</label>
								</div>
								<div class="form-group mt-4">
									<input id="password-field" type="password" class="form-control" name="password" required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Buat akun</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</form>
							<p class="text-center">sudah punya akun? <a href="{{ route('login-blade') }}">Login</a></p>
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

