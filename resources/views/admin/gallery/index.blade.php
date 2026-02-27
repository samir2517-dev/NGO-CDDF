@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Photo Gallery</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Source</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $key=>$item)
                            @php
                                // Determine image path based on source type
                                $imagePath = 'images/gallery/' . $item->image;
                                if ($item->source_type === 'program') {
                                    $imagePath = $item->image_type === 'cover' 
                                        ? 'images/programs/' . $item->image 
                                        : 'images/programs/gallery/' . $item->image;
                                } elseif ($item->source_type === 'project') {
                                    $imagePath = $item->image_type === 'cover' 
                                        ? 'images/project/' . $item->image 
                                        : 'images/ongoing_project/gallery/' . $item->image;
                                } elseif ($item->source_type === 'news') {
                                    $imagePath = $item->image_type === 'cover' 
                                        ? 'images/news/' . $item->image 
                                        : 'images/news/gallery/' . $item->image;
                                }
                            @endphp
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $item->title }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset($imagePath) }}" alt="" width="50">
                                </td>
                                <td class="align-middle">{{ Str::limit($item->description, 50) }}</td>
                                <td class="align-middle">
                                    @if($item->source_type === 'manual' || !$item->source_type)
                                        <span class="badge bg-secondary">Manual</span>
                                    @elseif($item->source_type === 'program')
                                        <span class="badge bg-primary">Program ({{ $item->image_type }})</span>
                                    @elseif($item->source_type === 'project')
                                        <span class="badge bg-info">Project ({{ $item->image_type }})</span>
                                    @elseif($item->source_type === 'news')
                                        <span class="badge bg-success">News ({{ $item->image_type }})</span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    @if($item->source_type === 'manual' || !$item->source_type)
                                        <a href="{{ route('gallery.edit',$item->id) }}" class="btn btn-outline-primary btn-sm me-1" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="{{ route('gallery.delete',$item->id) }}" class="btn btn-outline-danger btn-sm delete-confirm" title="Delete">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    @else
                                        <span class="text-muted" style="font-size: 0.85rem;">Auto-synced</span>
                                    @endif
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
