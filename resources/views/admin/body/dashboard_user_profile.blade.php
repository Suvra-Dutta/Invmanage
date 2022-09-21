@extends('admin.master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-header"><h4>User Profile</h4></div>
                        <div class="card-body">
                            <form action="{{ route('userprofile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_userimage" value="{{ $admin['profile_photo_path'] }}" />
                                <div class="form-group">
                                    <label for="loggedUserName">User Name</label>
                                    <input type="" name="loggedUserName" class="form-control" value="{{ $admin['name'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="loggedUserEmail">User Email</label>
                                    <input type="" name="loggedUserEmail" class="form-control" value="{{ $admin['email'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="loggedUserImage" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" name="loggedUserImage" value="{{ $admin['profile_photo_path'] }}">
                                    @error('loggedUserImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img src="{{ asset($admin->profile_photo_path) }}" alt="" style="height:400px;width:500px;">
                                </div>
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection