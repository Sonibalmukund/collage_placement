<x-adminnav>
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="{{ asset('images/images/banner-img.png')}}" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue"><h1>{{ $admin->name }}</h1></div>
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
                                <a href="{{ route('admin.jobs') }}">
								<div class="h4 mb-0">Listed Vacancies/Jobs</div>
								<div class="weight-600 font-14">{{ $Jobscount }}</div>
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
                                <a href="{{ route('admin.student') }}">
                                    <div class="h4 mb-0">Total Students</div>
                                    <div class="weight-600 font-14">{{ $StudentCount }}</div>
                                </a>
							</div>
						</div>
					</div>
				</div>

                <div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"><svg id="SvgjsSvg1141" width="70" height="102.69999999999999" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1143" class="apexcharts-inner apexcharts-graphical" transform="translate(-15, 0)"><defs id="SvgjsDefs1142"><clipPath id="gridRectMask18aebc"><rect id="SvgjsRect1144" width="106" height="102" x="-3" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask18aebc"><rect id="SvgjsRect1145" width="102" height="102" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1151"><stop id="SvgjsStop1152" stop-opacity="1" stop-color="rgba(242,242,242,1)" offset="0"></stop><stop id="SvgjsStop1153" stop-opacity="1" stop-color="rgba(0,150,136,1)" offset="1"></stop><stop id="SvgjsStop1154" stop-opacity="1" stop-color="rgba(0,150,136,1)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1161"><stop id="SvgjsStop1162" stop-opacity="1" stop-color="rgba(236,240,244,1)" offset="0"></stop><stop id="SvgjsStop1163" stop-opacity="1" stop-color="rgba(0,150,136,1)" offset="1"></stop><stop id="SvgjsStop1164" stop-opacity="1" stop-color="rgba(0,150,136,1)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1147" class="apexcharts-radialbar"><g id="SvgjsG1148"><g id="SvgjsG1149" class="apexcharts-tracks"><g id="SvgjsG1150" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.524268292682928" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446"></path></g></g><g id="SvgjsG1156"><g id="SvgjsG1160" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx1" rel="1" data:realIndex="0"><path id="SvgjsPath1165" d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 22.193195148565476 59.03497858553581" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient1161)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5.695121951219512" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="252" data:value="70" index="0" j="0" data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 22.193195148565476 59.03497858553581"></path></g><circle id="SvgjsCircle1157" r="21.47567073170732" cx="50" cy="50" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1158" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1159" font-family="Helvetica, Arial, sans-serif" x="50" y="55" text-anchor="middle" dominant-baseline="auto" font-size="15px" font-weight="400" fill="#333333" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">70%</text></g></g></g></g><line id="SvgjsLine1166" x1="0" y1="0" x2="100" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1167" x1="0" y1="0" x2="100" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg></div>
							</div>
							<div class="widget-data">
                                <a href="{{ route('admin.company') }}">
                                    <div class="h4 mb-0">Total Company</div>
                                    <div class="weight-600 font-14">{{ $companiescount }}</div>
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
                                <a href="{{ route('admin.jobs') }}">
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
                                <a href="{{ route('admin.jobs') }}">
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
	<!-- js -->
</x-adminnav>
