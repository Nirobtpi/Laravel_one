@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 mt-5">
                <h2>Deleted Sub Category List</h2>

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
                            @forelse ($subCategory as $key => $subCat)
                                <tr>
                                    <td>{{ $subCategory->firstItem() + $key }}</td>
                                    <td>{{ $subCat->sub_category_name }}</td>
                                    <td>{{ $subCat->category_id }}</td>
                                    <td>
                                        <a href="{{ url('/restore') }}/{{ $subCat->id }}"
                                            class="btn btn-outline-info">Restore</a>&nbsp;&nbsp;
                                        <a href="{{ url('/permanent_delete') }}/{{ $subCat->id }}"
                                            class="btn btn-outline-danger">Parmanent Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="4"><h2 class="text-center">Do Data Found!</h2></td></tr>
                            @endforelse
                            
                        </tbody>

                    </table>
                    {{ $subCategory->links() }}
                </div>
            </div>


        </div>
    </div>
@endsection
