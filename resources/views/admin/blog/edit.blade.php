@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Blog</h4>
        </div>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <div class="card-body">
            <form action="{{ route('update_blog',[$blogs->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    @if ($blogs->image)
                        <img src="{{ asset('assets/blog/'.$blogs->image) }}" class="blog-image">
                    @endif
                    <div class="col-md-6">
                        <label for="blog_image" class="control-label mb-1">Image</label>
                        <input id="blog_image" value="{{ $blogs->blog_image }}" name="blog_image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                    </div>
                    <div class="col-md-6">
                        <label for="">Blog Title</label>
                        <input type="text" value="{{ $blogs->blog_title }}" class="form-control" name="blog_title">
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

                    <div class="col-md-6">
                        <label for="">Author Name</label>
                        <input type="text" value="{{ $blogs->author_name }}" class="form-control" name="author_name">
                    </div>
                    
                    @if ($blogs->author_image)
                       <img src="{{ asset('assets/author/'.$blogs->author_image) }}" class="author-image">
                    @endif
                    <div class="col-md-6">
                        <label for="author_image" class="control-label mb-1">Author Image</label>
                        <input id="author_image" value="{{ $blogs->author_image }}" name="author_image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $blogs->meta_title }}" class="form-control" name="meta_title" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">Meta Description</label>
                        <input type="text" value="{{ $blogs->meta_description }}" class="form-control" name="meta_description" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="">Body</label>
                        <textarea id="body" value="{{ $blogs->body }}" name="body" type="text" class="form-control" >{{ $blogs->body }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection