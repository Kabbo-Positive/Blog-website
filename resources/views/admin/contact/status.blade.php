@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            All Contact
          </div>
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