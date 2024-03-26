@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="bg-success text-center border-bottom text-white p-3">Edit Category</h2>
                    <form action="{{ url('/update-category') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" value="{{ $category->id }}" name="cat_id">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" value="{{ $category->category_name }}" name="category_name"
                                class="form-control @error('category_name') is-invalid @enderror" id="category_name">

                            @error('category_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check text-center">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
