@extends('admin.master')
@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <!--
            <div class="card-header card-header-border-bottom">
                <h2></h2>
            </div>
            -->
            <div class="card-body">
                <form action="{{ route('store.about') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="aboutTitle">Title</label>
                        <input type="text" class="form-control" name="aboutTitle">
                    </div>
                    <div class="form-group">
                        <label for="shortDescription">Short Description</label>
                        <textarea class="form-control" name="shortDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="longDescription">Long Description</label>
                        <textarea class="form-control" name="longDescription" rows="3"></textarea>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
