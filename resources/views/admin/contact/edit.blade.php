@extends('admin.master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Contact
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Contact</div>
                        <div class="card-body">
                            <form action="{{ url('contact/update/'.$editContact->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="contactAddress" class="form-label">Update Contact Address</label>
                                    <input type="text" class="form-control" name="contactAddress" value="{{ $editContact->address }}">
                                </div>
                                <div class="mb-3">
                                    <label for="contactEmail" class="form-label">Update Contact Email</label>
                                    <input type="email" class="form-control" name="contactEmail" value="{{ $editContact->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="contactPhone" class="form-label">Update Contact Phone</label>
                                    <input type="text" class="form-control" name="contactPhone" value="{{ $editContact->phone }}">
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

