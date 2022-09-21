@extends('admin.master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Messages
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
                                    <h4>Messages</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10%;">Serial</th>
                                        <th scope="col" style="width: 15%;">Name</th>
                                        <th scope="col" style="width: 20%;">Email</th>
                                        <th scope="col" style="width: 35%;">Subject</th>
                                        <th scope="col" style="width: 35%;">Message</th>
                                        <th scope="col" style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allContactMessages as $messages)
                                    <tr class="">
                                        <th scope="row">{{ $allContactMessages->firstItem() + $loop->index }}</th>
                                        <td>{{ $messages->name }}</td>
                                        <td>{{ $messages->email }}</td>
                                        <td>{{ $messages->subject }}</td>
                                        <td>{{ $messages->message }}</td>
                                        <td>
                                            <a href="{{ url('contactmessage/delete/'.$messages->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $allContactMessages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

