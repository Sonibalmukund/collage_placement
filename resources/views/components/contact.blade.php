<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
<style>
    .alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}
</style>

</head>
<body>

    <x-nav/>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="contact">
        <h2>Contact Us</h2>
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            {{--  --}}
            <div class="form-group">
                <label for="exampleFormControlSelect1">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" placeholder="Enter Name">
                @error('name')
                <span style="color: red">{{ $message }}</span>

                @enderror
              </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  @error('email')
                  <span style="color: red">{{ $message }}</span>

                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect2">Subject</label>
                  <input type="text" name="subject" placeholder="Enter Subject"value="{{ old('subject') }}" class="form-control" id="Subject">
                  @error('subject')
                  <span style="color: red">{{ $message }}</span>

                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Enter message</label>
                  <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3">{{ old('message') }}</textarea>
                  @error('message')
                  <span style="color: red">{{ $message }}</span>

                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
    </section>

    <x-footer/>

</body>
</html>
