@extends('layouts.app')

@section('content')
 <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card mt-5">
                            <div class="card-body">
                                <h2 class="bg-success text-center border-bottom text-white p-3">Add Sub Category</h2>
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                        <form action="{{ url('/add-subcategory-post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="sub_category_name" class="form-label">Sub Category Name</label>
                                <input type="text" name="sub_category_name" value="{{ old('sub_category_name') }}" class="form-control @error('sub_category_name') is-invalid @enderror" id="sub_category_name">

                                @error('sub_category_name')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                               
                                <label for="category_id" class="form-label">Category Name</label>
                                
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                    
                                </select>
                                
                                @error('category_id')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="mb-3 form-check text-center">
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                            
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection