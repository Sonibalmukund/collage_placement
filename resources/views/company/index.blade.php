<x-companynav>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div>
								<a href="{{ route('jobs.create') }}" class="btn btn-primary">Create Job</a>

							</div>
						</div>
					</div>
				</div>
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Jobs Dashboard</h4>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($job as $jobs)
                                        <tr>
                                            <td class="table-plus">{{ $jobs->title }}</td>
                                            <td>{{ $jobs->position }}</td>
                                            <td>{{ $jobs->vacancy }}</td>
                                            <td>{{ $jobs->location }}</td>
                                            <td>{{ $jobs->type }}</td>
                                            <td>{{ $jobs->salary }}</td>
                                            <td>{{ $jobs->application_deadline }}</td>
                                            <td>
                                                <a type="button" href="{{ route('jobs.show', $jobs->id) }}" class="btn btn-outline-primary">Show</a>
                                                <a type="button" href="{{ route('jobs.edit', $jobs->id) }}" class="btn btn-outline-info">Edit</a>
                                                <button onclick="shareJob({{ $jobs->id }})" class="btn btn-success"><i class="fas fa-share"></i></button>

                                                <form id="deleteForm-{{ $jobs->id }}" action="{{ route('jobs.destroy', $jobs->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete({{ $jobs->id }})">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" style="text-align: center;">Data Not Found.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>

					</div>
				</div>
				<!-- Export Datatable End -->
			</div>
		</div>
	</div>
    <!-- Modal HTML -->
<!-- Modal HTML -->
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="shareModalBody">
                <!-- Job details will be populated here -->
            </div>
            <div class="modal-footer">
                <a id="whatsapp-share" href="#" target="_blank" class="btn btn-secondary">
                    <i class="fab fa-whatsapp"></i>
                    {{-- <img src="{{ asset('images/whastapp.png') }}" alt="WhatsApp" width="20"> --}}
                </a>
                <a id="facebook-share" href="#" target="_blank" class="btn btn-primary">
                    <i class="fab fa-facebook"></i>
                    {{-- <img src="{{ asset('images/facebook.png')}}" alt="Facebook" width="20"> --}}
                </a>
                <a id="twitter-share" href="#" target="_blank" class="btn btn-secondary">
                    <i class="fab fa-twitter"></i>
                    {{-- <img src="{{ asset('images/twitter-logo.png')}}" alt="Twitter" width="20"> --}}
                </a>
            </div>
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
    <script>
        var baseUrl = "{{ asset('storage') }}";
    </script>

<script>
        let jobDetails = ''; // Variable to hold job details

        function shareJob(jobId) {
            fetch(`/share/${jobId}`)
                .then(response => response.json())
                .then(job => {
                    // Construct the message
                    const message = `
                        Job Title: ${job.title}
                        Company Name: ${job.company.name}
                        Email: ${job.company.email}
                        Website: ${job.company.website}
                        Job Apply Last Date: ${job.application_deadline}
                    `;

                    // Encode the message to be used in a URL
                    const encodedMessage = encodeURIComponent(message);

                    // URLs for different platforms
                    const whatsappUrl = `https://wa.me/?text=${encodedMessage}`;
                    const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodedMessage}`;
                    const twitterUrl = `https://twitter.com/intent/tweet?text=${encodedMessage}`;

                    // Assign the URLs to the buttons
                    document.getElementById('whatsapp-share').href = whatsappUrl;
                    document.getElementById('facebook-share').href = facebookUrl;
                    document.getElementById('twitter-share').href = twitterUrl;

                    // Show the modal with the sharing options
                    $('#shareModal').modal('show');
                })
                .catch(error => console.error('Error fetching job details:', error));
        }
</script>
</x-companynav>
