@extends('admin.master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Brand
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Brand</div>
                        <div class="card-body">
                            <form action="{{ url('brand/update/'.$editBrandData->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $editBrandData->brand_image }}" />
                                <div class="mb-3">
                                    <label for="brandName" class="form-label">Update Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" placeholder="Enter Brand Name" value="{{ $editBrandData->brand_name }}">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="brandImage" class="form-label">Update Brand Image</label>
                                    <input type="file" class="form-control" name="brand_image" value="{{ $editBrandData->brand_image }}">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset($editBrandData->brand_image) }}" style="height:400px;width:500px;">
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

