@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Invoked</h6>
        <hr/>
        <div class="card">
            <div class="card-body">

                <div class="p-4 border rounded table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($file as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        {{ Str::limit($value->name, 30, '...') }}
                                    </td>
                                    <td>
                                        {{ $value->file }}
                                    </td>
                                    <td>
                                        <a href="{{ route('invoked.edit',$value->id) }}" class="btn btn-outline-primary btn-sm me-1" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="{{ route('invoked.delete',$value->id) }}" class="btn btn-outline-danger btn-sm delete-confirm" title="Delete">
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
