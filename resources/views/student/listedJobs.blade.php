<x-studentnav>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .job-row {
            cursor: pointer;
        }
        .job-row.selected {
            background-color: darkblue; /* Highlight color */
            color: white; /* Text color */
        }
    </style>
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
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">January 2018</a>
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
                        <h4 class="text-blue h4">Listed Jobs</h4>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                <tr class="job-row" onclick="toggleRow(this)">
                                    <td class="table-plus">{{ $job->title }}</td>
                                    <td><img src="{{ asset('storage/'.$job->company->logo) }}" style="width: 50px; height: 50px;" alt=""></td>
                                    <td>{{ $job->company->name }}</td>
                                    <td>{{ $job->vacancy }}</td>
                                    <td>{{ $job->salary }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td>
                                        <a href="{{ route('student.show', ['id' => $job->id]) }}" class="btn btn-outline-primary">More Details</a>
                                        <button onclick="shareJob({{ $job->id }})" class="btn btn-success"><i class="fas fa-share"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
                    </a>
                    <a id="facebook-share" href="#" target="_blank" class="btn btn-primary">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a id="twitter-share" href="#" target="_blank" class="btn btn-secondary">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var baseUrl = "{{ asset('storage') }}";

        function toggleRow(row) {
            row.classList.toggle('selected');
        }

        function shareJob(jobId) {
            fetch(`/share/${jobId}`)
                .then(response => response.json())
                .then(job => {
                    const message = `Job Title: ${job.title}\nCompany Name: ${job.company.name}\nEmail: ${job.company.email}\nWebsite: ${job.company.website}\nJob Apply Last Date: ${job.application_deadline}`;
                    const encodedMessage = encodeURIComponent(message);

                    document.getElementById('whatsapp-share').href = `https://wa.me/?text=${encodedMessage}`;
                    document.getElementById('facebook-share').href = `https://www.facebook.com/sharer/sharer.php?u=${encodedMessage}`;
                    document.getElementById('twitter-share').href = `https://twitter.com/intent/tweet?text=${encodedMessage}`;

                    $('#shareModal').modal('show');
                })
                ;
        }
    </script>
</x-studentnav>
