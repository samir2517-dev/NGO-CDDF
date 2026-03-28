@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">View Message</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <table class="table table-borderless mb-3">
                        <tr>
                            <th style="width: 100px;">Name :</th>
                            <td>{{ $message->name }}</td>
                        </tr>
                        <tr>
                            <th>Email :</th>
                            <td>{{ $message->email }}</td>
                        </tr>
                        <tr>
                            <th>Subject :</th>
                            <td class="fw-bold">{{ $message->subject }}</td>
                        </tr>
                        <tr>
                            <th class="align-top">Message :</th>
                            <td>{{ $message->message }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('message.index') }}" class="btn btn-sm btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
