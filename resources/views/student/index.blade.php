<x-studentnav>
    <div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="{{ asset('images/images/banner-img.png')}}" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue"><h1>{{ $student->username }}</h1></div>
						</h4>
						<p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
                                <a href="{{ route('student.jobs') }}">
								<div class="h4 mb-0">Listed Vacancies/Jobs</div>
								<div class="weight-600 font-14">{{ $availableJobCount }}</div>
                            </a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
                                <a href="{{ route('student.applied.jobs') }}">
                                    <div class="h4 mb-0">Total Applied Jobs</div>
                                    <div class="weight-600 font-14">{{ $appliedJobCount }}</div>
                                </a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
                                <a href="{{ route('student.applied.jobs') }}">
                                    <div class="h4 mb-0">Today's Applied Jobs</div>
                                    <div class="weight-600 font-14">{{ $todayAppliedJobs }}</div>
                                </a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
                                <a href="{{ route('student.applied.jobs') }}">
                                    <div class="h4 mb-0">Yesterady's Applied Jobs</div>
                                    <div class="weight-600 font-14">{{ $yesterdayAppliedJobs }}</div>
                                </a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</x-studentnav>

	<!-- js -->
