<!DOCTYPE html>
<html>
<x-head/>
<body class="login-page">
    <x-nav>
        <li><a href="{{ route('company') }}">Register</a></li>
    </x-nav>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{ asset('images/images/login-page-img.png')}}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Company Login</h2>
						</div>
						<form method="POST" action="{{ route('company.login') }}">
                            @csrf
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="admin">
										<div class="icon"><img src="{{ asset('images/images/briefcase.svg')}}" class="svg" alt=""></div>
										<span>I'm</span>
										Manager
									</label>
									<label class="btn">
										<input type="radio" name="options" id="user">
										<div class="icon"><img src="{{ asset('images/images/person.svg')}}" class="svg" alt=""></div>
										<span>I'm</span>
										Employee
									</label>
								</div>
							</div>
							<div class="input-group custom">
								<input type="email" name="email" class="form-control form-control-lg" placeholder="Enter Email">
                                <br>
                                <div>
                                    @error('email')
                                    <span class="alert alert-danger mt-2" style="display: block;">{{ $message }}</span>
                                    @enderror
                            </div>
							</div>
							<div class="input-group custom">
								<input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
                                @error('password')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
                                <div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                                        <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                                        <div class="input-group mb-0">
                                            <a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('company') }}">Register To Create Account</a>
                                        </div>
									</div>
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->

	<script src="{{ asset('js/core.js') }}"></script>
	<script src="{{ asset('js/script.min.js') }}"></script>
	<script src="{{ asset('js/process.js') }}"></script>
	<script src="{{ asset('js/layout-settings.js') }}"></script>
</body>

</html>
