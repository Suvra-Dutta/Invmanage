@extends('admin.master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit About Us
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit About Us</div>
                        <div class="card-body">
                            <form action="{{ url('about/update/'.$editAboutData->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="aboutTitle" class="form-label">Update About Us Title</label>
                                    <input type="text" class="form-control" name="aboutTitle" value="{{ $editAboutData->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="shortDescription" class="form-label">Update Short Description</label>
                                    <input type="text" class="form-control" name="shortDescription" value="{{ $editAboutData->short_desc }}">
                                </div>
                                <div class="mb-3">
                                    <label for="longDescription" class="form-label">Update Long Description</label>
                                    <input type="text" class="form-control" name="longDescription" value="{{ $editAboutData->long_desc }}">
                                </div>
                                <button type="submit" style="float: right;" class="btn form-control btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

