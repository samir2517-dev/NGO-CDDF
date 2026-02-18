@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Message</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $key=>$message)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $message->name }}</td>
                                <td class="align-middle">{{ $message->email }}</td>
                                <td class="align-middle">{{ $message->subject }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('message.view',$message->id) }}" class="btn btn-outline-info btn-sm me-1" title="View">
                                        <i class="mdi mdi-eye"></i>
                                    </a>
                                    <a href="{{ route('message.delete',$message->id) }}" class="btn btn-outline-danger btn-sm delete-confirm" title="Delete">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
