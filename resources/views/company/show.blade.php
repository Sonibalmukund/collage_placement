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
									<li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav>
					</div>
				</div>
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Show Jobs</h4>
					</div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">Job Name</th>
                                            <th>Postion</th>
                                            <th>Vacancy</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Salary</th>
                                            <th>Apply Date</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- Job Title -->
                                            <td class="table-plus">{{ $job->title }}</td>

                                            <!-- Student Name -->
                                            <td>{{ $job->position }}</td>

                                            <!-- Company Name (optional, same for all) -->
                                            <td>{{ $job->vacancy }}</td>

                                            <!-- Student Email -->
                                            <td>{{ $job->location }}</td>
                                            <td>{{ $job->type }}</td>
                                            <td>{{ $job->salary }}</td>
                                            <td>
                                                {{ $job->application_deadline }}
                                            </td>
                                            <td>{{ $job->description }}</td>

                                        </tr>
                                    </tbody>
                                </table>

					</div>
				</div>
				<!-- Export Datatable End -->
			</div>
		</div>
	</div>
	<!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('deleteButton').addEventListener('click', function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    document.getElementById('deleteForm').submit();
                }
            })
        });
    </script>

</x-companynav>
