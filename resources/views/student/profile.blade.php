<x-studentnav>
    <div class="height-100-p">
        <div class="profile-setting">
            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div  style="margin-top: 4%;">
                    <br>
                    <h4 class="text-blue h5 ">Edit Your Personal Setting</h4>
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input class="form-control form-control-lg" id="name" name="full_name" value="{{ old('full_name', $student->full_name ?? '') }}" type="text">

                        @if ($errors->has('full_name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label>User Name</label>
                        <input class="form-control form-control-lg" name="username" type="text" value="{{ old('username', $student->username ?? '') }}">
                        @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control form-control-lg" name="email" type="email" value="{{ old('email', $student->email) }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input class="form-control form-control-lg" name="city" value="{{ old('city', $student->city ?? '') }}" type="text" placeholder="Enter city">
                        @if ($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <input class="form-control form-control-lg" name="state" value="{{ old('state', $student->state ?? '') }}" type="text" placeholder="Enter state">
                        @if ($errors->has('state'))
                        <span class="text-danger">{{ $errors->first('state') }}</span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label>Mobile No</label>
                        <input class="form-control form-control-lg" name="contact_number" type="text">
                        @if ($errors->has('contact_number'))
                            <span class="text-danger">{{ $errors->first('contact_number') }}</span> <!-- Display confirmation error here -->
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                            <select class="custom-select col-12" name="gender">
                                <option value="" disabled {{ old('type', $student->gender) == null ? 'selected' : '' }}>Choose...</option>
                                <option value="male" {{ old('type', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('type', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('type', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label>Password (leave blank if not changing)</label>
                                <input class="form-control form-control-lg" name="password" type="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span> <!-- Display password error here -->
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control form-control-lg" name="password_confirmation" type="password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span> <!-- Display confirmation error here -->
                                @endif
                            </div>

                    <div class="form-group">
                        <label>Profile Photo:</label>
                        <input class="form-control form-control-lg" name="profile_photo" value="{{ old('profile_photo', $student->profile_photo ?? '') }}" type="file" placeholder="Paste your link here">
                        @if ($errors->has('profile_photo'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span> <!-- Display confirmation error here -->
                        @endif
                      <img src="{{ asset('storage/'.$student->profile_photo)}}" style="height: 85px;margin-left: 40px;margin-top:10px;" alt="">
                    </div>
                </div>
                <div class="form-group mb-0" style="text-align: center">
                    <input type="submit" class="btn btn-primary" value="Save & Update">
                </div>

        </form>
        </div>
        <!-- Setting Tab End -->
        </div>
</x-studentnav>
