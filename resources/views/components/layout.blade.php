<!DOCTYPE html>
<html lang="en">
    <x-head/>
<body>

    <x-nav>
        <li><a href="{{ route('login') }}">Login</a></li>
    </x-nav>

    <div class="image">
        {{-- <img src="{{ asset('images/freepik-export-20240910090627q2tl.jpeg') }}" height="100%" alt="" srcset=""> --}}
					<img src="{{ asset('images/images/login-page-img.png')}}" alt="">

    </div>


   <x-about/>

    <section id="services" class="section services">
        <h2>Services</h2>
        <div class="service-grid">
            <div class="service-item">
                <img src="{{ asset('images/career-counseling.jpg') }}" alt="Career Counseling">
                <h3>Career Counseling</h3>
                <p>We provide expert advice to guide students in their career paths.</p>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/placement-support.jpg') }}" alt="Placement Support">
                <h3>Placement Support</h3>
                <p>Assistance with job placements through our extensive network.</p>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/resume-building.jpg') }}" alt="Resume Building">
                <h3>Resume Building</h3>
                <p>Help in crafting professional resumes to stand out to employers.</p>
            </div>
        </div>
    </section>
   <x-footer/>
</body>
</html>
