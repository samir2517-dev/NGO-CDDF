@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Latest News</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="" placeholder="Enter News Title">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Cover Image (Required)</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="img">
                            <span class="text-info">This is the main cover image for the news. Image Dimension Must be (725 X 375) and maximum size 300 kb.</span>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="gallery_images" class="form-label">Additional Gallery Images (Optional)</label>
                            <input type="file" name="gallery_images[]" class="form-control" id="gallery_images" multiple accept="image/*">
                            <span class="text-info">You can select multiple images. These will be displayed as a gallery below the cover image.</span>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">

                            </textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
