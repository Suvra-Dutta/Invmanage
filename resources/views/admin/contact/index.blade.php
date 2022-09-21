@extends('admin.master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact
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
                                    <h4>Contacts</h4>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('add.contact') }}" class="btn btn-info">Add Contact</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%;">Serial</th>
                                        <th scope="col" style="width: 30%;">Address</th>
                                        <th scope="col" style="width: 15%;">Email</th>
                                        <th scope="col" style="width: 15%;">Phone</th>
                                        <th scope="col" style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allContacts as $contacts)
                                    <tr class="">
                                        <th scope="row">{{ $allContacts->firstItem() + $loop->index }}</th>
                                        <td>{{ $contacts->address }}</td>
                                        <td>{{ $contacts->email }}</td>
                                        <td>{{ $contacts->phone }}</td>
                                        <td>
                                            <a href="{{ url('contact/edit/'.$contacts->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('contact/delete/'.$contacts->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $allContacts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

