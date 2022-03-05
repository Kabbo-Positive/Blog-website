@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Blog</h4>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="card-body">
        <form action="{{ route('insert_blog') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="">Blog Image</label>
                    <input type="file" class="form-control" name="blog_image" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Blog Title</label>
                    <input type="text" class="form-control" name="blog_title" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" type="text" class="form-control" required>
                        <option value="">Select Categories</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Author Name</label>
                    <input type="text" class="form-control" name="author_name" required>
                </div>
                
                <div class="col-md-6 mb-4">
                    <label for="">Author Image</label>
                    <input type="file" class="form-control" name="author_image" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" required>
                </div>

                <div class="col-md-12 mb-4">
                    <label for="">Meta Description</label>
                    <input type="text" class="form-control" name="meta_description"  required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label for="">Body</label>
                    <textarea id="body" name="body" type="text" class="form-control" required></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <button type="submit" class="btn w-100  btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace('body');
</script>
@endsection