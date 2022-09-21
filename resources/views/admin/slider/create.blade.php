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
                <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="slideTitle">Title</label>
                        <input type="text" class="form-control" name="slideTitle">
                        <!--<span class="mt-2 d-block"></span>-->
                    </div>
                    <div class="form-group">
                        <label for="slideDescription">Description</label>
                        <textarea class="form-control" name="slideDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="slideImage">Slide Image</label>
                        <input type="file" class="form-control-file" name="slideImage">
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
