@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Reply Message</h4>
        </div>
        <div class="card-body">
            <form action="" method="" enctype="">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input type="text" id="name" value="{{ $contacts->name }}" class="form-control" name="name" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">Email</label>
                        <input type="text" value="{{ $contacts->email }}"  class="form-control" name="email" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">Service</label>
                        <input type="text" value="{{ $contacts->service }}" class="form-control" name="service" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">File</label>
                        <input value="{{ $contacts->file }}"  class="form-control" name="file">
                        <a href="{{ route('download_file',[$contacts->file]) }}">Download</a>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">Subject</label>
                        <input type="text"  value="{{ $contacts->subject }}" class="form-control" name="subject" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="">Message</label>
                        <textarea type="text" value="{{ $contacts->message }}" class="form-control" name="message" required>{{ $contacts->message }}</textarea>
                    </div>

                    <div class="col mb-12">
                        <label for="">Reply Message</label>
                        <textarea type="text" value="{{ $contacts->reply_message }}" class="form-control" name="reply_message" required>{{ $contacts->reply_message }}</textarea>
                    </div>

                </div>
                
            </form>
        </div>
    </div>
@endsection