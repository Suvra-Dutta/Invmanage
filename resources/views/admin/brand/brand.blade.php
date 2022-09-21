@extends('admin.master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Brands
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-header"><h4>All Brands</h4></div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Brand Image</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--pagination doesn't show serialize numbers-->
                                    <!--@php($serial=1)-->
                                    @foreach($allBrands as $brands)
                                    <tr class="">
                                        <!--<th scope="row">{{ $serial++ }}</th>-->
                                        <th scope="row">{{ $allBrands->firstItem() + $loop->index }}</th>

                                        <td>{{ $brands->brand_name }}</td>
                                        <td><img src="{{ asset($brands->brand_image) }}" style="height:40px;width:60px;"></td>
                                        <!--<td>{{-- $category->created_at --}}</td>-->

                                        <!-- In Eloquent ORM if created_at data is not inserted & is Null -->
                                        <td>
                                            @if($brands->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                            @else
                                            <!--{{ $brands->created_at }}-->

                                            <!-- For created date what time ago-->
                                            <!--{{-- $brands->created_at->diffForHumans() --}}-->

                                            <!-- For created date what time ago in DB Query Builder-->
                                            {{ Carbon\Carbon::parse( $brands->created_at )->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('brand/edit/'.$brands->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('brand/delete/'.$brands->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $allBrands->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="brandName" class="form-label">Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" placeholder="Enter Brand Name">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="brandImage" class="form-label">Brand Image</label>
                                    <input type="file" class="form-control" name="brand_image" placeholder="">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" style="float: right;" class="btn form-control btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

