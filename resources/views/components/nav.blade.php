
<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/images/deskapp-logo.svg')}}" alt="">
            </a>
        </div>
        <div class="login-menu">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>

                <li><a href="{{ route('dashboard') }}">Services</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                {{ $slot }}

            </ul>
        </div>
    </div>
</div>
