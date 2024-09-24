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
									<li class="breadcrumb-item"><a href="{{ route('student.applied.jobs') }}">Home</a></li>
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
							<h4 class="text-blue h4">Status Update</h4>
							<p class="mb-30">All bootstrap element classies</p>
						</div>

					</div>


					<form action="{{ route('applied.job.update', ['job' => $job->id, 'student' => $student->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Update Status</label>
							<div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="status">
                                    <option selected>Choose...</option>
                                    <option value="pending" {{ $jobApplication->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="accepted" {{ $jobApplication->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="rejected" {{ $jobApplication->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
							</div>
						</div>
                        <div class="form-group row">
							<div class="col-sm-24 col-md-10">
                                <button style="margin-left:200px;" type="submit" class="btn btn-primary">Update Status:</button>
							</div>
						</div>
					</form>

				<!-- Default Basic Forms End -->

				<!-- horizontal Basic Forms Start -->

	<!-- js -->
</x-companynav>
