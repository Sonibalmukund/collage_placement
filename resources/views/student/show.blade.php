<!DOCTYPE html>
<html>
<x-head>
    <style>
        .container {
            display: flex;
            align-items: flex-start; /* Align items to the top */
            width: 100%;
            position: relative; /* Ensure the pseudo-element is positioned correctly */
        }

        .column {
            flex: 1; /* Allow columns to grow equally */
            padding: 20px;
            border: 1px solid #ccc;
            position: relative;
            width: 50%;
            box-sizing: border-box; /* Required for pseudo-element positioning */
        }

        .left {
            flex: 1;
            max-width: 30%;

        }
        .content {
            display: flex;
            flex-direction: column;
        }

        .item {
             display: inline-block;
            border-bottom: 2px solid #000; /* Thickness and color of the underline */
            padding-bottom: 10px; /* Space between text and underline */
            margin-bottom: 10px; /* Space between items */
        }

        /* Remove underline from the last item */
        .item:last-of-type {
            border-bottom: none;
        }
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .status-pending {
            border-style: solid;
            background-color: yellow;
            color: black;
        }

        .status-accepted {
            border-style: solid;
            background-color: green;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .status-rejected {
            border-style: solid;
            background-color: red;
            color: black;
        }

        </style>
        <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</x-head>
<body>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">From</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">To</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="{{ asset('images/images/img.jpg') }}" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{ asset('images/images/photo1.jpg')}}" alt="">
										<h3>Lea R. Frith</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{ asset('images/images/photo2.jpg')}}" alt="">
										<h3>Erik L. Richards</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{ asset('images/images/photo3.jpg')}}" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{ asset('images/images/photo4.jpg')}}" alt="">
										<h3>Renee I. Hansen</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{ asset('images/images/img.jpg')}}" alt="">
										<h3>Vicki M. Coleman</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="{{ asset('images/images/photo1.jpg')}}" alt="">
						</span>
						<span class="user-name">{{ $student->username }}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="dw dw-logout"></i> Log Out
                        </a>
					</div>
				</div>
			</div>
			<div class="github-link">
				<a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg" alt=""></a>
			</div>
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="{{ route('student.dashboard') }}">
				<img src="{{ asset('images/images/deskapp-logo.svg')}}" alt="" class="dark-logo">
				<img src="{{ asset('images/images/deskapp-logo-white.svg')}}" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
                    <li>
						<a href="{{ route('student.dashboard') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-library"></span><span class="mtext">Dashboard</span>
						</a>

					</li>
					<li>
						<a href="{{ route('student.jobs') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-library"></span><span class="mtext">Listed Jobs</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DataTable</h4>
							</div>
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('student.jobs') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
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
				<div class="card-box mb-30">
                        <div class="pd-20">
                            <h4 class="text-blue h4">Job Details</h4>
                        </div>
                        <div class="pd-20">
                            @if (!empty($success))
                            <h1 style="color: green">{{$success}}</h1>
                            @endif
                        </div>
                        <div class="pb-20">
                                <div class="container">
                                    <div class="column left">
                                        <div class="content">
                                            <div class="item">Job Title</div>
                                            <div class="item">Company Name</div>
                                            <div class="item">Monthly In-hand Salary</div>
                                            <div class="item">Company Website</div>
                                            <div class="item">Company Email</div>
                                            <div class="item">Job Location</div>
                                            <div class="item">No Of Opening</div>
                                            <div class="item">Last Date</div>
                                            <div class="item">Status</div>
                                            <div class="item">Job Description </div>
                                            @if(isset($application))
                                            <button type="button" class="btn btn-outline-danger" disabled>
                                                Applied
                                            </button>
                                        @elseif(now() > $job->application_deadline)
                                        <button type="button" class="btn btn-outline-danger" disabled>Job Expired</button>
                                        @else
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#myModal" id="openModalBtn">
                                                Apply Now
                                            </button>
                                        @endif




                                        </div>
                                    </div>
                                    <div class="column right">
                                        <div class="content">
                                            <div class="item">{{ $job->title }}</div>
                                            <div class="item">{{ $job->company->name }}</div>
                                            <div class="item">$ {{ $job->salary }}</div>
                                            <div class="item"><a href="{{ $job->company->website }}" target="_blank">{{ $job->company->website }}</a></div>
                                            <div class="item">{{ $job->company->email }}</div>
                                            <div class="item">{{ $job->location }}</div>
                                            <div class="item">{{ $job->vacancy }}</div>
                                            <div class="item">{{ $job->formatted_deadline }}</div>
                                            <div class="item">
                                                 @if(isset($application))
                                                    @if($application->status === 'pending')
                                                    <span class="badge bg-warning" disabled>Applied (Pending)</span>
                                                @elseif($application->status === 'accepted')
                                                    <span class="badge bg-success" disabled>Accepted</span>
                                                @elseif($application->status === 'rejected')
                                                    <span class="badge bg-danger" disabled>Rejected</span>
                                                @endif
                                            @else
                                                <span class="badge bg-secondary" disabled>Not Applied!!</span>
                                            @endif</div>
                                            <div class="item">{{ $job->description }}</div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="applyModalLabel">Apply for Job</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('job.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="resume" class="form-label">Upload Your Resume</label>
                                                <input type="file" class="form-control" id="resume" name="resume_file">
                                                @error('resume_file')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            <div class="mb-3">
                                                <label for="tenth_mark" class="form-label">10th Mark</label>
                                                <input type="number" class="form-control" id="tenth_mark" name="tenth_mark" step="0.01" required>
                                                @error('tenth_mark')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="twelfth_mark" class="form-label">12th Mark</label>
                                                <input type="number" class="form-control" id="twelfth_mark" name="twelfth_mark" step="0.01" required>
                                                @error('twelfth_mark')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="graduation_mark" class="form-label">Graduation Mark</label>
                                                <input type="number" class="form-control" id="graduation_mark" name="graduation_mark" step="0.01" required>
                                                @error('graduation_mark')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit Application</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				<!-- Export Datatable End -->
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="{{ asset('js/core.js') }}"></script>
	<script src="{{ asset('js/script.min.js') }}"></script>
	<script src="{{ asset('js/process.js') }}"></script>
	<script src="{{ asset('js/datatables/layout-settings.js') }}"></script>
	<script src="{{ asset('js/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js//responsive.bootstrap4.min.js')}}"></script>
	<!-- buttons for Export datatable -->
	<script src="{{ asset('js/datatables/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{ asset('js/datatables/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('js/datatables/js/buttons.print.min.js')}}"></script>
	<script src="{{ asset('js/datatables/js/buttons.html5.min.js')}}"></script>
	<script src="{{ asset('js/datatables/js/buttons.flash.min.js')}}"></script>
	<script src="{{ asset('js/datatables/js/pdfmake.min.js')}}"></script>
	<script src="{{ asset('js/datatables/js/vfs_fonts.js')}}"></script>
	<!-- Datatable Setting js -->
	<script src="{{ asset('js/datatables/js/datatable-setting.js') }}"></script></body>
</html>
