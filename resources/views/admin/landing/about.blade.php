@extends('admin.master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home About
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
                                    <h4>About Us</h4>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('add.about') }}" class="btn btn-info">Add About</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10%;">Serial</th>
                                        <th scope="col" style="width: 15%;">Title</th>
                                        <th scope="col" style="width: 20%;">Short Description</th>
                                        <th scope="col" style="width: 35%;">Long Description</th>
                                        <th scope="col" style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($aboutUs as $about)
                                    <tr class="">
                                        <th scope="row">{{ $aboutUs->firstItem() + $loop->index }}</th>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->short_desc }}</td>
                                        <td>{{ $about->long_desc }}</td>
                                        <td>
                                            <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('about/delete/'.$about->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $aboutUs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

