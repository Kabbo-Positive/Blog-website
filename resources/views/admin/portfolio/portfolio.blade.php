@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    All Portfolio
  </div>
  <div class="row">
    <div class="col-md-6 mb-4">
  <td>
    <a href="{{ route('add_portfolio') }}"><button type="button" class="btn btn-success">
      Add Portfolio
    </button>
    </a>
  </td>
    </div>
  </div>
  <div class="col-12">
    <div class="row">
      @foreach ($portfolios as $item)
      <div class="col-md-4 col-sm-6">
        <div class="card">
          <img class="card-img-top" src="{{ asset('assets/portfolio/'.$item->image) }}" class="portfolio-image" alt="image">
          <br>
          <div class="card-body">
            <h6 class="card-title">{{ $item->title }}</h6>
            <br>
            <a href="{{ route('edit_portfolio',[$item->id]) }}" class="btn btn-success">Edit</a>
            <a href="{{ route('delete_portfolio',[$item->id]) }}" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="row">
    {{ $portfolios->links() }}
</div>
</div>
@endsection