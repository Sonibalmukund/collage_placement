<x-companynav>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Basic</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Jobs Create</h4>
							<p class="mb-30">All bootstrap element classies</p>
						</div>

					</div>
					<form action="{{ route('jobs.store') }}" method="POST">
                        @csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="title" placeholder="Enter Job Name">
                                @error('title')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
							</div>
						</div>
                        <input type="hidden" name="company_id" value="{{ auth()->guard('company')->user()->id }}">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Position</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="Enter Position" name="position" type="text">
                                @error('position')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Vacancy</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="vacancy" value="vacancy" placeholder="Enter Vacancy" type="number">
                                @error('vacancy')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
							</div>
						</div>
						<div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="location" id="location" type="text" placeholder="Fetching location...">
                                @error('location')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Last Application Date</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" name="application_deadline" placeholder="Select Date" type="text">
                                @error('application_deadline')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Type</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="type">
									<option selected="">Choose...</option>
									<option value="full-time">Full Time</option>
									<option value="part-time">Part Time</option>
									<option value="contract">Contract</option>
                                    <option value="internship">Internship</option>
								</select>
                                @error('type')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Salary</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="salary" value="" type="number">
                                @error('salary')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea id="description" class="form-control" name="description" rows="5"></textarea>
                                @error('description')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label"></label>
                            <div class="col-sm-12 col-md-10">
                                <button type="submite" class="btn btn-outline-primary">Save</button>
                            </div>
                        </div>
					</form>
					<div class="collapse collapse-box" id="basic-form1" >
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#copy-pre"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#basic-form1" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>
							<pre><code class="xml copy-pre" id="copy-pre">

				<!-- Input Validation End -->

			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
	<!-- js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 2
                    },
                    // Other rules...
                },
                messages: {
                    title: {
                        required: "Please enter a job name",
                        minlength: "Job name must be at least 2 characters long"
                    },
                    // Other messages...
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</x-companynav>
