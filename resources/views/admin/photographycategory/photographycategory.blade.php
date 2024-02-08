@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            All PhotographyCategory
          </div>
          <div class="row">
            <div class="col-md-6 mb-4">
                <td>
                    <a href="{{ route('add_photography_category') }}"><button type="button" class="btn btn-success">Add Category</button></a>
                </td>
            </div>
          </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pcategories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->pcategory_name }}</td>
                            <td>
                                <a href="{{ route('edit_photography_category',[$item->id]) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('delete_photography_category',[$item->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection