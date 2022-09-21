@extends('admin.master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Slide
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Slide</div>
                        <div class="card-body">
                            <form action="{{ url('slider/update/'.$editSlideData->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $editSlideData->image }}" />
                                <div class="mb-3">
                                    <label for="slideTitle" class="form-label">Update Slide Title</label>
                                    <input type="text" class="form-control" name="slideTitle" value="{{ $editSlideData->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="slideDescription" class="form-label">Update Slide Description</label>
                                    <input type="text" class="form-control" name="slideDescription" value="{{ $editSlideData->description }}">
                                </div>
                                <div class="mb-3">
                                    <label for="brandImage" class="form-label">Update Slide Image</label>
                                    <input type="file" class="form-control" name="slideImage" value="{{ $editSlideData->image }}">
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset($editSlideData->image) }}" style="height:400px;width:500px;">
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

