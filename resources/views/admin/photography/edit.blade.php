photography@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Photography</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('update_photography',[$photography->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    @if ($photography->image)
                    <img src="{{ asset('assets/photography/'.$photography->image) }}" class="portfolio-image">
                @endif
                    <div class="col-md-12">
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" value="{{ $photography->image }}" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">Title</label>
                        <input type="text" value="{{ $photography->title }}" class="form-control" name="title" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">Sub Title</label>
                        <input type="text" value="{{ $photography->sub_title }}" class="form-control" name="sub_title" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $photography->meta_title }}" class="form-control" name="meta_title" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">Meta Description</label>
                        <input type="text" value="{{ $photography->meta_description }}" class="form-control" name="meta_description" required>
                    </div>
                </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                
            </form>
        </div>
    </div>
@endsection