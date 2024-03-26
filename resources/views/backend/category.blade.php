@extends('layouts.app')

@section('content')
 <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card mt-5">
                            <div class="card-body">
                                <h2 class="bg-success text-center border-bottom text-white p-3">Add New Category</h2>
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                            {{-- @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif --}}
                        <form action="{{ url('/add-category-post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" name="category_name" value="{{ old('category_name') }}" class="form-control @error('category_name') is-invalid @enderror" id="category_name">

                                @error('category_name')
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