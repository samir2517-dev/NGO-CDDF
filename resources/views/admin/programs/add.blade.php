@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Program</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('programs.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Program Title">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Cover Image (Required)</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="img">
                            <small class="text-muted">This will be the main cover image for the program</small>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="gallery_images" class="form-label">Additional Gallery Images (Optional)</label>
                            <input type="file" name="gallery_images[]" class="form-control" id="gallery_images" multiple accept="image/*">
                            <small class="text-muted">You can select multiple images. These will be displayed as a gallery below the cover image.</small>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="active">Active</option>
                                <option value="completed">Completed</option>
                                <option value="upcoming">Upcoming</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date (Optional)</label>
                            <input type="date" name="start_date" class="form-control" id="start_date">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
