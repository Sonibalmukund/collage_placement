<x-companynav>

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
									<li class="breadcrumb-item"><a href="{{ route('applied.job') }}">Home</a></li>
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
						<h4 class="text-blue h4">Applied Students Details</h4>
					</div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">Job Title</th>
                                            <th>Student Name</th>
                                            <th>Company Name</th>
                                            <th>Student Email</th>
                                            <th>Job Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($jobApplications as $application)
                                        <tr>
                                            <!-- Job Title -->
                                            <td class="table-plus">{{ $application->job->title }}</td>

                                            <!-- Student Name -->
                                            <td>{{ $application->student->full_name }}</td>

                                            <!-- Company Name (optional, same for all) -->
                                            <td>{{ $application->job->company->name }}</td>

                                            <!-- Student Email -->
                                            <td>{{ $application->student->email }}</td>

                                            <!-- Job Status (pending, accepted, rejected) -->
                                            <td>
                                            @if($application->status === 'pending')
                                            <span class="badge bg-warning">Applied (Pending)</span>
                                            @elseif($application->status === 'accepted')
                                            <span class="badge bg-success"> Accepted</span>
                                            @elseif($application->status === 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                            @elseif($application->status === 'not applied')
                                            <span class="badge bg-secondary" >
                                                    Apply Now
                                            </span>
                                            @endif
                                        </td>
                                            <!-- More details button -->
                                            <td>
                                                <a href="{{ route('applied.job.show', ['job' => $application->job->id, 'student' => $application->student->id]) }}" class="btn btn-outline-primary">More Details</a>
                                                <a href="{{ route('applied.job.edit', ['job' => $application->job->id, 'student' => $application->student->id]) }}" class="btn btn-outline-primary">Status Update</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" style="
                                            text-align: center;">No job applications found for your company's jobs.</td>
                                        </tr>
                                        @endforelse
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
</x-companynav>
