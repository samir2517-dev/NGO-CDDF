@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Project Archive</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Project Name</th>
                                <th>Partner/Donor Name</th>
                                <th>Duration</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $key=>$value)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ Str::limit($value->name, 30, '...') }}</td>
                                <td class="align-middle">{{ Str::limit($value->partners, 30, '...') }}</td>
                                <td class="align-middle">{{ $value->from_date}}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('project.archive.edit',$value->id) }}" class="btn btn-outline-primary btn-sm me-1" title="Edit">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="{{ route('project.archive.delete',$value->id) }}" class="btn btn-outline-danger btn-sm delete-confirm" title="Delete">
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
