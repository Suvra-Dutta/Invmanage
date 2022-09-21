<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
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
                        <div class="card-header">All Categories</div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--pagination doesn't show serialize numbers-->
                                    <!--@php($serial=1)-->
                                    @foreach($allCategories as $category)
                                    <tr class="">
                                        <!--<th scope="row">{{ $serial++ }}</th>-->
                                        <th scope="row">{{ $allCategories->firstItem() + $loop->index }}</th>

                                        <td>{{ $category->category_name }}</td>
                                        <!--<td>{{-- $category->userDetails->name --}}</td>-->

                                        <!--In case of DB Join Query-->
                                        <td>{{ $category->name }}</td>

                                        <!--<td>{{-- $category->created_at --}}</td>-->

                                        <!-- In Eloquent ORM if created_at data is not inserted & is Null -->
                                        <td>
                                            @if($category->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                            @else
                                            <!--{{ $category->created_at }}-->

                                            <!-- For created date what time ago-->
                                            <!--{{-- $category->created_at->diffForHumans() --}}-->

                                            <!-- For created date what time ago in DB Query Builder-->
                                            {{ Carbon\Carbon::parse( $category->created_at )->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-warning">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $allCategories->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="categoryName" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" style="float: right;" class="btn form-control btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Deleted Categories -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><span class="text-danger"> Deleted Categories</span></div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--pagination doesn't show serialize numbers-->
                                    <!--@php($serial=1)-->
                                    @foreach($deletedCategories as $deletedcategory)
                                    <tr class="">
                                        <!--<th scope="row">{{ $serial++ }}</th>-->
                                        <th scope="row">{{ $deletedCategories->firstItem() + $loop->index }}</th>

                                        <td>{{ $deletedcategory->category_name }}</td>
                                        <!--<td>{{-- $deletedcategory->userDetails->name --}}</td>-->

                                        <!--In case of DB Join Query-->
                                        <td>{{ $deletedcategory->name }}</td>

                                        <!--<td>{{-- $deletedcategory->created_at --}}</td>-->

                                        <!-- In Eloquent ORM if created_at data is not inserted & is Null -->
                                        <td>
                                            @if($deletedcategory->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                            @else
                                            <!--{{ $deletedcategory->created_at }}-->

                                            <!-- For created date what time ago-->
                                            <!--{{-- $deletedcategory->created_at->diffForHumans() --}}-->

                                            <!-- For created date what time ago in DB Query Builder-->
                                            {{ Carbon\Carbon::parse( $deletedcategory->created_at )->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('category/restore/'.$deletedcategory->id) }}" class="btn btn-primary">Restore</a>
                                            <a href="{{ url('foreverdelete/category/'.$deletedcategory->id) }}" class="btn btn-danger">Delete Forever</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $deletedCategories->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Deleted Categories -->
        </div>
    </div>
</x-app-layout>

