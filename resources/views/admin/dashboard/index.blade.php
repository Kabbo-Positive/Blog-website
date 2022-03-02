@extends('layouts.admin')

@section('content')
    <div>
        <h1>Dashboard</h1>
    </div>

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                <!-- task, page, download counter  start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted m-b-0 f-12">Total Blog</h6>
                                    <h4 class="text-c-purple">{{ $blogcount }}</h4>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-ticket f-28" aria-hidden="true"></i>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted m-b-0 f-12">Total Portfolio</h6>
                                    <h4 class="text-c-purple">{{ $portfoliocount }}</h4>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-ticket f-28" aria-hidden="true"></i>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted m-b-0 f-12">Total Contact</h6>
                                    <h4 class="text-c-purple">{{ $contactcount }}</h4>
                                    <h6 class="text-muted m-b-0 f-12">Total Unread Contact</h6>
                                    <h4 class="text-c-purple">{{ $contactunreadcount }}</h4>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-ticket f-28" aria-hidden="true"></i>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-header">
                        All Unread Contact
                    </div>
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
                </div>
            </div>
    </div>
                
@endsection