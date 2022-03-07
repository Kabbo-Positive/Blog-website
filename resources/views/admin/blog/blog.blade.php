@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    All Blog
  </div>
  <div class="row">
    <div class="col-md-6 mb-4">
      <td>
        <a href="{{ route('add_blog') }}"><button type="button" class="btn btn-success">Add Blog</button></a>
      </td>
    </div>
  </div>
  <div class="col-12">
    <div class="row">
      @foreach ($blogs as $item)
      <div class="col-md-4 col-sm-6">
        <div class="card">
          <img class="card-img-top" src="{{ asset('assets/blog/'.$item->blog_image) }}" class="blog-image" alt="blog_image">
          <br>
          <div class="card-body">
            <h6 class="card-title">{{ $item->blog_title }}</h6>
            <br>
            <h6 class="card-title">{{ $item->author_name }}</h6>
            <br>
            <h6 class="card-title">{{ $item->created_at->format('d-M-Y') }}</h6>
            <br>
            <a href="{{ route('edit_blog',[$item->id]) }}" class="btn btn-success">Edit</a>

            <a href="{{ route('delete_blog',[$item->id]) }}" class="btn btn-danger">Delete</a>

            @if($item->featured)
            <a href="{{ route('featured_blog',[$item->id]) }}" class="btn btn-success">Featured</a>
            @else
           <form action="{{ route('featured_blog') }}" method="post">
             <input type="hidden" name="id" value="{{ $item->id }}">
             @csrf
             <button type="submit" class="btn btn-sm btn-danger">Make It Featured</button>
           </form>
            @endif

          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection