@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All FAQ</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Question</th>
                                <th>Category</th>
                                <th>Order</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $item->question }}</td>
                                <td class="align-middle">{{ $item->category }}</td>
                                <td class="align-middle">{{ $item->order }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('faq.edit',$item->id) }}" class="btn btn-outline-primary btn-sm me-1" title="Edit">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="{{ route('faq.delete',$item->id) }}" class="btn btn-outline-danger btn-sm delete-confirm" title="Delete">
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
