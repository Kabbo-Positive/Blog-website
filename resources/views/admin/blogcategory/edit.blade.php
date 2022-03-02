@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit BlogCategory</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('update_category',[$categories->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label for="">Category Name</label>
                        <input type="text" value="{{ $categories->category_name }}" class="form-control" name="category_name" required>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection