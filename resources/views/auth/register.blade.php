<!DOCTYPE html>
<html>

<x-head/>

<body class="login-page">
    <x-nav>
    <li><a href="{{ route('login') }}">Login</a></li>
	</x-nav>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{asset ('images/images/register-page-img.png') }}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="register-box bg-white box-shadow border-radius-10">
						<div class="wizard-content">
							<form method="POST" action="{{ route('register.store') }}" class="tab-wizard2 wizard-circle wizard">
                                @csrf
								<h5>Basic Account Credentials</h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Email Address*</label>
											<div class="col-sm-8">
												<input type="email" name="email" class="form-control">
											</div>
                                            @error('email')
                                            <span class="alert alert-danger" style="
                                            margin-left: 37%;
                                            margin-top: 10px;">{{ $message }}</span>
                                            @enderror
										</div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Username*</label>
											<div class="col-sm-8">
												<input type="text" name="username" class="form-control">
											</div>
                                            @error('username')
                                            <span class="alert alert-danger" style="
                                            margin-left: 37%;
                                            margin-top: 10px;">{{ $message }}</span>
                                            @enderror
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Password*</label>
											<div class="col-sm-8">
												<input type="password"  name="password" class="form-control">
											</div>
                                            @error('password')
                                            <span class="alert alert-danger" style="
                                            margin-left: 37%;
                                            margin-top: 10px;">{{ $message }}</span>
                                            @enderror
										</div>
										<div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Confirm Password*</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                            @error('password_confirmation')
                                            <span class="alert alert-danger" style="margin-left: 37%; margin-top: 10px;">{{ $message }}</span>
                                            @enderror
                                        </div>
									</div>
								</section>
								<!-- Step 2 -->
								<h5>Personal Information</h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Full Name*</label>
											<div class="col-sm-8">
												<input type="text" name="full_name" class="form-control">
											</div>
                                            @error('full_name')
                                            <span class="alert alert-danger" style="
                                            margin-left: 37%;
                                            margin-top: 10px;">{{ $message }}</span>
                                            @enderror
										</div>
										<div class="form-group row align-items-center">
                                            <label class="col-sm-4 col-form-label">Gender*</label>
                                            <div class="col-sm-8">
                                                <div class="custom-control custom-radio custom-control-inline pb-0">
                                                    <input type="radio" id="male" name="gender" value="Male" class="custom-control-input">
                                                    <label class="custom-control-label" for="male">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline pb-0">
                                                    <input type="radio" id="female" name="gender" value="Female" class="custom-control-input">
                                                    <label class="custom-control-label" for="female">Female</label>
                                                </div>
                                                @error('gender')
                                                <span class="alert alert-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">City</label>
											<div class="col-sm-8">
												<input type="text" name="city" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">State</label>
											<div class="col-sm-8">
												<input type="text" name="state" class="form-control">
											</div>
										</div>
									</div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Contact Number</label>
                                        <div class="col-sm-8">
                                            <input type="text"  name="contact_number" class="form-control">
                                        </div>
                                        @error('contact_number')
                                        <span class="alert alert-danger" style="
                                        margin-left: 37%;
                                        margin-top: 10px;">{{ $message }}</span>
                                        @enderror
                                    </div>
								</section>
								<!-- Step 3 -->

								<!-- Step 4 -->

                                <button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
                                <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered max-width-400" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center font-18">
                                                <h3 class="mb-20">Form Submitted!</h3>
                                                <div class="mb-30 text-center"><img src="{{ asset('images/images/success.png') }}"></div>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="submit" class="btn btn-primary">Done</button>
                                            </div>
                                        </div>
                                    </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html Start -->

	</div>
	<!-- success Popup html End -->
	<!-- js -->
	<script src="{{ asset('js/core.js') }}"></script>
	<script src="{{ asset('js/script.min.js') }}"></script>
	<script src="{{ asset('js/process.js') }}"></script>
	<script src="{{ asset('js/layout-settings.js') }}"></script>
	<script src="{{ asset('js/jquery.steps.js') }}"></script>
	<script src="{{ asset('js/steps-setting.js') }}"></script>
</body>


</html>
