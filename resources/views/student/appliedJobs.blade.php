<x-studentnav>

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
						<h4 class="text-blue h4">Applied Jobs</h4>
					</div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Job Title</th>
									<th>Company Logo</th>
									<th>Company Name</th>
									<th>Vacancy</th>
									<th>Salary</th>
									<th>Location</th>
                                    <th>Application Date</th>
                                    <th>Status</th>
								</tr>
							</thead>
							<tbody>
                                @foreach($appliedJobs as $appliedJob)
                                <tr>
                                    <td class="table-plus">{{ $appliedJob->job->title }}</td>

                                    <td><img src="{{ asset('storage/'.$appliedJob->job->company->logo) }}" alt="Company Logo" style="width: 50px; height: 50px;"></td>
                                    <td>{{ $appliedJob->job->company->name }}</td>
                                    <td>{{ $appliedJob->job->vacancy }} </td>
                                    <td>{{ $appliedJob->job->salary }}</td>
                                    <td>{{ $appliedJob->job->location }}</td>
                                    <td>{{ $appliedJob->created_at->format('d M, Y') }}</td>
                                    <td>
                                        @if($appliedJob->status === 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($appliedJob->status === 'accepted')
                                            <span class="badge bg-success">Accepted</span>
                                        @elseif($appliedJob->status === 'rejected')
                                            <span class="badge bg-danger">Rejected</span>

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

		</div>
	</div>
	<!-- js -->
</x-studentnav>
