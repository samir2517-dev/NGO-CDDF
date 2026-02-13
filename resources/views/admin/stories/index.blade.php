@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Success Stories</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Beneficiary Name</th>
                                <th>Beneficiary Title</th>
                                <th>Image</th>
                                <th>Rating</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $item->beneficiary_name }}</td>
                                <td class="align-middle">{{ $item->beneficiary_title }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/stories/'.$item->image) }}" alt="" width="50">
                                </td>
                                <td class="align-middle">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $item->rating)
                                            <span class="text-warning">&#9733;</span>
                                        @else
                                            <span class="text-muted">&#9734;</span>
                                        @endif
                                    @endfor
                                </td>
                                <td class="align-middle">{{ $item->date }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('stories.edit',$item->id) }}" class="btn btn-outline-primary btn-sm me-1" title="Edit">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="{{ route('stories.delete',$item->id) }}" class="btn btn-outline-danger btn-sm delete-confirm" title="Delete">
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
