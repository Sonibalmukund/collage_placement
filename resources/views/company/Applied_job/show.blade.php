<x-companynav>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Applied Students Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('applied.job') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Applied Students</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Student Application Details</h4>
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
                    <div class="pb-20">
                        <div class="application-card">
                            <h5>Job Title: {{ $jobApplication->job->title }}</h5>
                            <p><strong>Student Name:</strong> {{ $jobApplication->student->username }}</p>

                            <p><strong>Student Gender:</strong> {{ $jobApplication->student->gender ?? 'N/A' }}</p>

                            <p><strong>Student City:</strong> {{ $jobApplication->student->city ?? 'N/A' }}</p>

                            <p><strong>Student state:</strong> {{ $jobApplication->student->state ?? 'N/A' }}</p>

                            <p><strong>Student Email:</strong> {{ $jobApplication->student->email }}</p>

                            <p><strong>10<sup>th</sup>Mark</strong>: {{ $jobApplication->tenth_mark ?? 'N/A'}}</p>

                            <p><strong>Apply Date:</strong> {{ $jobApplication->student->created_at ? $jobApplication->student->created_at->format('d/m/Y') : 'N/A' }}</p>


                            <p><strong>12<sup>th</sup>Mark</strong>: {{ $jobApplication->twelfth_mark ?? 'N/A'}}</p>

                            <p><strong>Graduction </strong>: {{ $jobApplication->graduation_mark ?? 'N/A'}}</p>

                            <p><strong>Student Contact Number:</strong> {{ $jobApplication->student->contact_number ?? 'N/A' }}</p>

                            <p><strong>Position:</strong> {{ $jobApplication->job->position ?? 'N/A' }}</p>

                            <p><strong>Vacancy:</strong> {{ $jobApplication->job->vacancy ?? 'N/A' }}</p>

                            <p><strong>Job Status:</strong>
                                 @if($jobApplication->status === 'pending')
                                <span class="badge bg-warning">Applied (Pending)</span>
                                @elseif($jobApplication->status === 'accepted')
                                <span class="badge bg-success"> Accepted</span>
                                @elseif($jobApplication->status === 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                                @elseif($jobApplication->status === 'not applied')
                                <span class="badge bg-secondary" >
                                        Apply Now
                                </span>
                                @endif
                            </p>

                            <p>
                                <strong>Resume:</strong>
                                <a href="{{ asset('storage/' . $jobApplication->resume->resume_file) }}" target="_blank">View Resume</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="footer-wrap pd-20 mb-20 card-box">
                    DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
                </div>
            </div>
        </div>
    </div>
</x-companynav>

<style>
.application-card {
    border: 1px solid #ffffff;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 5px;
    background-color: #ffffff;
}
.application-card h5 {
    margin: 0 0 10px;
}
</style>
