<!DOCTYPE html>
<html lang="en">
    <x-head>

    </x-head>
<body>
    <x-nav>
        <li>
            @guest('student')
                <a href="{{ route('login') }}">Login</a>
            @else
                <a href="{{ route('student.dashboard') }}">Dashboard</a>
            @endguest
        </li>


    </x-nav>
    <div class="image">
        <img src="{{ asset('images/images/login-page-img.png')}}" alt="">
    </div>
    <section id="services" class="section services">
        <h2>Services</h2>
        <div class="service-grid">
            @foreach($jobs as $job)
                <div class="service-item">
                    <img src="{{ asset('storage/'.$job->company->logo) }}"
                    alt="{{ $job->company->name }} Logo"
                    style="height: 100px; width: 100px;">
                    <br> <br>
                    <h5><b>Job Title:</b> {{ $job->title }}</h5>
                    <br>
                    <h6><b>Company Name:</b> {{ $job->company->name }}</h6>
                    <br><br>
                    <small><i class="fa-solid fa-users"></i>{{ $job->vacancy }}</small>
                    &nbsp;<small>${{ $job->salary }}</small>
                    &nbsp; <small><i class="fa-solid fa-location-dot"></i> {{ $job->location }}</small>
                    <br>
                    @if (!($job->id))
                    <a href="{{ route('job.show', ['id' => $job->id]) }}" style="margin-top: 10px;" type="button" class="btn btn-outline-primary">More Details</a>
                    @else
                    <a href="{{ route('dashboard.show', ['id' => $job->id]) }}" style="margin-top: 10px;" type="button" class="btn btn-outline-primary">More Details</a>
                    @endif



                </div>
            @endforeach
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
