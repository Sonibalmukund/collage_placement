<x-companynav>
    <div class="height-100-p">
    <div class="profile-setting">
        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div  style="margin-top: 4%;">
                <br>
                <h4 class="text-blue h5 ">Edit Your Personal Setting</h4>
                <input type="hidden" name="company_id" value="{{ $company->id }}">
                <div class="form-group">
                    <label>Full Name</label>
                    <input class="form-control form-control-lg" id="name" name="name" value="{{ old('name', $company->name ?? '') }}" type="text">

                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>


                <div class="form-group">
                    <label>Website</label>
                    <input class="form-control form-control-lg" name="website" type="text" value="{{ old('website', $company->website ?? '') }}">
                    @if ($errors->has('website'))
                    <span class="text-danger">{{ $errors->first('website') }}</span>
                @endif
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control form-control-lg" name="email" type="email" value="{{ old('email', $company->email) }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                </div>
                <div class="form-group">
                    <label>Linkedin URL:</label>
                    <input class="form-control form-control-lg" name="linkedin_url" value="{{ old('linkedin_url', $company->linkedin_url ?? '') }}" type="text" placeholder="Paste your link here">
                    @if ($errors->has('linkedin_url'))
                    <span class="text-danger">{{ $errors->first('linkedin_url') }}</span>
                @endif
                </div>
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
                    <label>Logo:</label>
                    <input class="form-control form-control-lg" name="logo" value="{{ old('logo', $company->logo ?? '') }}" type="file" placeholder="Paste your link here">
                  <img src="{{ asset('storage/'.$company->logo)}}" style="height: 85px;margin-left: 40px;margin-top:10px;" alt="">
                </div>
            </div>
            <div class="form-group mb-0" style="text-align: center">
                <input type="submit" class="btn btn-primary" value="Save & Update">
            </div>

    </form>
    </div>
    <!-- Setting Tab End -->
    </div>
</x-companynav>
