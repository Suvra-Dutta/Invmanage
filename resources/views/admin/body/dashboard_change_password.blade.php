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
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-header"><h4>Change Password</h4></div>
                        <div class="card-body">
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="currentPassword">Current Password</label>
                                    <input type="" name="currentPassword" class="form-control" id="currentPassword">
                                    @error('currentPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="changePassword">Change Password</label>
                                    <input type="" name="changePassword" class="form-control" id="changePassword">
                                    @error('changePassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="" name="confirmPassword" class="form-control" id="confirmPassword">
                                    @error('confirmPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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