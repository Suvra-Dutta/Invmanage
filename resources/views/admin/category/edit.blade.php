<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Category</div>
                        <div class="card-body">
                            <form action="{{ url('category/update/'.$editCategoryData->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="categoryName" class="form-label">Update Category Name</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name" value="{{ $editCategoryData->category_name }}">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" style="float: right;" class="btn form-control btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

