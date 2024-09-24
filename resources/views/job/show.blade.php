<x-head>
<style>
.container {
    display: flex;
    align-items: flex-start; /* Align items to the top */
    width: 100%;
    position: relative; /* Ensure the pseudo-element is positioned correctly */
}

.column {
    flex: 1; /* Allow columns to grow equally */
    padding: 20px;
    border: 1px solid #ccc;
    position: relative;
    width: 50%;
    box-sizing: border-box; /* Required for pseudo-element positioning */
}

.left {
    flex: 1;
    max-width: 30%;

}
.content {
    display: flex;
    flex-direction: column;
}

.item {
     display: inline-block;
    border-bottom: 2px solid #000; /* Thickness and color of the underline */
    padding-bottom: 10px; /* Space between text and underline */
    margin-bottom: 10px; /* Space between items */
}

/* Remove underline from the last item */
.item:last-of-type {
    border-bottom: none;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.status-pending {
    border-style: solid;
    background-color: yellow;
    color: black;
}

.status-accepted {
    border-style: solid;
    background-color: green;
    color: black;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.status-rejected {
    border-style: solid;
    background-color: red;
    color: black;
}

</style>

</x-head>
<x-nav>
    <li>
        @guest('student')
        <a href="{{ route('login') }}">Login</a>
    @else
        <a href="{{ route('student.dashboard') }}">Dashboard</a>
    @endguest

    </li>

</x-nav>
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Job Details</h4>
    </div>
    <div class="pd-20">
        @if (!empty($success))
        <h1 style="color: green">{{$success}}</h1>
        @endif
    </div>
    <div class="pb-20">
            <div class="container">
                <div class="column left">
                    <div class="content">
                        <div class="item">Job Title</div>
                        <div class="item">Job Position</div>
                        <div class="item">Company Name</div>
                        <div class="item">Monthly In-hand Salary</div>
                        <div class="item">Company Website</div>
                        <div class="item">Company Email</div>
                        <div class="item">Job Location</div>
                        <div class="item">No Of Opening</div>
                        <div class="item">Last Date</div>
                        <div class="item">Job Description </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="content">
                        <div class="item">{{ $jobs->title }}</div>
                        <div class="item">{{ $jobs->position }}</div>
                        <div class="item">{{ $company->name }}</div>
                        <div class="item">$ {{ $jobs->salary }}</div>
                        <div class="item"><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></div>
                        <div class="item">{{ $company->email }}</div>
                        <div class="item">{{ $jobs->location }}</div>
                        <div class="item">{{ $jobs->vacancy }}</div>
                        <div class="item">{{ $jobs->formatted_deadline }}</div>
                        <div class="item">{{ $jobs->description }}</div>

                </div>
            </div>
    </div>

</div>
    <script src="{{ asset('js/core.js')}}"></script>
	<script src="{{ asset('js/datatables/js/script.min.js')}}"></script>
	<script src="{{ asset('js/datatables/js/process.js')}}"></script>
	<script src="{{ asset('js/datatables/js/layout-settings.js')}}"></script>
	<script src="{{ asset('js/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('js/datatables/js/vfs_fonts.js') }}"></script>
	<script src="{{ asset('js/datatables/js/datatable-setting.js')}}"></script>
</body>
