@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            All Contact
          </div>
          <form action="" class="col-9">
            <div class="form-group">
              <input type="search" name="search" id="" class="form-control" placeholder="Search by Name or Email" value="{{ $search }}"/>
            </div>
            <button class="btn btn-success">Search</button>
            <a href="{{ route('contact') }}">
               <button class="btn btn-success" type="button">Reset</button>
            </a>
        </form>
        <form type="get" action="{{ route('status_contact') }}" class="col-3">
              <fieldset class="form-group">
                <select class="form-select" name="status">
                   <option selected disabled>Status</option>
                   <option value="Read">Read</option>
                   <option value="Unread">Unread</option>
                   <option value="Completed">Completed</option>
            </select>
           </fieldset>
           <button type="submit" class="btn btn-success">Search</button>
        </form>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Service</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->service }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('reply_contact',Crypt::encryptString($item->id))}}" class="btn btn-success">View</a>
                                <a href="{{ route('delete_contact',[$item->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@endsection