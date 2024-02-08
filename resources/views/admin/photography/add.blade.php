@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Photography</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('insert_photography') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="category_id">Category</label>
                    <select id="pcategory_id" name="pcategory_id" type="text" class="form-control" required>
                        <option value="">Select Categories</option>
                        @foreach ($pcategories as $item)
                            <option value="{{ $item->id }}">{{ $item->pcategory_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="">Sub Title</label>
                    <input type="text" class="form-control" name="sub_title" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="">Meta Description</label>
                    <input type="text" class="form-control" name="meta_description" required>
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