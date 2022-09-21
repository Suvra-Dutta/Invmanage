@extends('admin.master')
@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create Contact</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('store.contact') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="contactAddress">Address</label>
                        <input type="text" class="form-control" name="contactAddress">
                    </div>
                    <div class="form-group">
                        <label for="contactEmail">Email</label>
                        <input type="email" class="form-control" name="contactEmail" rows="3">
                    </div>
                    <div class="form-group">
                        <label for="contactPhone">Phone</label>
                        <input type="text" class="form-control" name="contactPhone" rows="3">
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
