<x-adminnav>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DataTable</h4>
							</div>
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
						<h4 class="text-blue h4">Student Details</h4>
					</div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">Student Name</th>
                                            <th>Student Email</th>
                                            <th>Gender</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Resume</th>
                                        </tr>
                                    </thead>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->full_name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender }}</td>
                                        @if(!($student->city))
                                        <td>N/A</td>
                                        @else
                                        <td>{{ $student->city }}</td>
                                        @endif
                                        @if(!($student->state))
                                        <td>N/A</td>
                                        @else
                                        <td>{{ $student->state }}</td>
                                        @endif
                                        <td>
                                            @if ($student->resumes->isNotEmpty())
                                                <!-- Display only the first resume -->
                                                <a href="{{ asset('storage/' . $student->resumes->first()->resume_file) }}" target="_blank">View Resume</a>
                                            @else
                                                No Resume File
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>

					</div>
				</div>
				<!-- Export Datatable End -->
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
	<!-- js -->
</x-adminnav>
