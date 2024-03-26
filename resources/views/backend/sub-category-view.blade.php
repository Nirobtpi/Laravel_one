@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 mt-5">
                <h2 class="bg-success p-3 text-center">Sub Category List (Total {{ $count }})</h2>

                @if (session('delete'))
                    <div class="alert alert-danger">
                        {{ session('delete') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('update'))
                    <div class="alert alert-success">
                        {{ session('update') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">SUb Category Name</th>
                                <th scope="col">Category Id</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subCategory as $key => $subCat)
                                <tr>
                                    <td>{{ $subCategory->firstItem()+ $key }}</td>
                                    <td>{{ $subCat->sub_category_name }}</td>
                                    <td>{{ $subCat->category_id }}</td>
                                    <td>
                                        <a href="{{ url('/edit-subcategory') }}/{{ $subCat->id }}" class="btn btn-outline-info">Edit</a>&nbsp;&nbsp;
                                        <a href="{{ url('/delete-subcategory') }}/{{ $subCat->id }}" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $subCategory->links() }}
                </div>
            </div>


        </div>
    </div>
@endsection
