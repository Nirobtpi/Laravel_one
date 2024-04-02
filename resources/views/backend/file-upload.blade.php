@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-8 offset-2">
                <form action="{{ url('/add-file') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" class="form-control" name="name" id="file_upload" />
                    </div>
                    <div class="mb-3">
                        <label for="photo_name" class="form-label">Email</label>
                        <input type="file" class="form-control" name="photo_name" id="photo_name" />
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Add Photo" class="btn btn-outline-success">
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
