@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-1 mt-5">
            <h2>Category List</h2>

            @if(session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
            @endif
            @if(session('update'))
            <div class="alert alert-success">
                {{ session('update') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Category Name</th>
                            {{-- <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key=> $category)

                        <tr class="">
                            {{-- <td scope="row">{{ $loop->index + 1 }}</td> --}}
                            {{-- paginet ar jorno aita use korta hbe --}}
                            <td scope="row">{{ $categories->firstItem() + $key }}</td>
                            <td>{{ $category->category_name ?? "N/A" }}</td>
                            {{-- <td>{{ Carbon\Carbon::parse ($category->created_at)->diffForHumans() ?? "N/A" }}</td>
                            <td>{{ @if($categiry->updated_at !=""){
                                        Carbon\Carbon::parse($category->updated_at)->diffForHumans();
                                    } }}</td> --}}
                            <td>
                                <a href="{{ url('/edit-category') }}/{{ $category->id }}"
                                    class="btn btn-warning">Edit</a>&nbsp;&nbsp;
                                <a href="{{ url('/delete-category') }}/{{ $category->id  }}"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
                {{ $categories->links() }}
            </div>
        </div>


    </div>
</div>
@endsection
