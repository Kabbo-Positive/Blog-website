@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add BlogCategory</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('insert_category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label for="">Blog Category</label>
                    <input type="text" class="form-control" name="category_name" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <button type="submit" class="btn w-100 btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection