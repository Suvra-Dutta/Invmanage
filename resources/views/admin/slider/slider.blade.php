@extends('admin.master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Slides
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4>All Slides</h4>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('add.slider') }}" class="btn btn-info">Add Slide</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%;">Serial</th>
                                        <th scope="col" style="width: 10%;">Title</th>
                                        <th scope="col" style="width: 35%;">Description</th>
                                        <th scope="col" style="width: 20%;">Image</th>
                                        <th scope="col" style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allSlides as $slides)
                                    <tr class="">
                                        <th scope="row">{{ $allSlides->firstItem() + $loop->index }}</th>
                                        <td>{{ $slides->title }}</td>
                                        <td>{{ $slides->description }}</td>
                                        <td><img src="{{ asset($slides->image) }}" style="height:40px;width:60px;"></td>
                                        <td>
                                            <a href="{{ url('slider/edit/'.$slides->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('slider/delete/'.$slides->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $allSlides->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

