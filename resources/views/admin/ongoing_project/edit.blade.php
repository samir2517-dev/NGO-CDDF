@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Ongoing Project</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('project.update',$project->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $project->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Cover Image (Required)</label>
                            <input type="file" name="image" class="form-control" id="img">
                            <span class="text-info">Leave empty to keep the current cover image. Image Dimension Must be (725 X 375) and maximum size 300 kb.</span>
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Current Cover Image: </label>
                            <img src="{{ asset('images/project/'.$project->image) }}" alt="" width="100">
                        </div>
                        
                        <!-- Gallery Images Section -->
                        @if($project->gallery_images)
                        <div class="col-md-12">
                            <label class="form-label">Current Gallery Images:</label>
                            <small class="text-muted d-block mb-2">Drag images to reorder them. Click the delete icon to remove.</small>
                            <div class="row g-2" id="gallery-container">
                                @foreach(json_decode($project->gallery_images) as $index => $galleryImage)
                                <div class="col-md-2 gallery-item" data-image="{{ $galleryImage }}" draggable="true">
                                    <div class="position-relative" style="cursor: move;">
                                        <span class="badge bg-primary position-absolute top-0 start-0" style="z-index: 10;">{{ $index + 1 }}</span>
                                        <img src="{{ asset('images/ongoing_project/gallery/'.$galleryImage) }}" alt="" class="img-thumbnail">
                                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-gallery-image" data-image="{{ $galleryImage }}" style="z-index: 10;">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="deleted_gallery_images" id="deleted_gallery_images" value="[]">
                            <input type="hidden" name="gallery_order" id="gallery_order" value="">
                        </div>
                        @endif
                        
                        <div class="col-md-12">
                            <label for="gallery_images" class="form-label">Add More Gallery Images (Optional)</label>
                            <input type="file" name="gallery_images[]" class="form-control" id="gallery_images" multiple accept="image/*">
                            <small class="text-muted">You can select multiple images to add to the gallery.</small>
                        </div>
                        
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">
                                {{ $project->description }}
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

@push('scripts')
<script>
    // Check if jQuery is loaded
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is not loaded!');
    } else {
        console.log('Gallery management script loading...');
        
        jQuery(document).ready(function($) {
            let deletedImages = [];
            let galleryItemToDelete = null;
            
            console.log('Gallery items found:', $('.gallery-item').length);
            
            // Handle gallery image deletion
            $(document).on('click', '.delete-gallery-image', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                console.log('Delete button clicked');
                
                // Store reference to the gallery item
                galleryItemToDelete = $(this).closest('.gallery-item');
                const imageName = $(this).data('image');
                
                // Show the existing delete confirmation modal
                const deleteModalElement = document.getElementById('deleteConfirmModal');
                const deleteModal = new bootstrap.Modal(deleteModalElement);
                deleteModal.show();
                
                // Set up one-time click handler for confirmation
                $('#confirmDeleteBtn').off('click.galleryDelete').on('click.galleryDelete', function() {
                    if (galleryItemToDelete && imageName) {
                        console.log('Deleting image:', imageName);
                        
                        // Add to deleted images array
                        deletedImages.push(imageName);
                        $('#deleted_gallery_images').val(deletedImages.join(','));
                        
                        // Remove the item from display
                        galleryItemToDelete.fadeOut(300, function() {
                            $(this).remove();
                            updatePositionNumbers();
                            updateGalleryOrder();
                        });
                        
                        // Hide modal and reset
                        deleteModal.hide();
                        galleryItemToDelete = null;
                    }
                });
            });
            
            // Drag and Drop functionality
            let draggedElement = null;
            
            $(document).on('dragstart', '.gallery-item', function(e) {
                draggedElement = this;
                $(this).css('opacity', '0.5');
                e.originalEvent.dataTransfer.effectAllowed = 'move';
            });
            
            $(document).on('dragend', '.gallery-item', function(e) {
                $(this).css('opacity', '1');
            });
            
            $(document).on('dragover', '.gallery-item', function(e) {
                e.preventDefault();
                e.originalEvent.dataTransfer.dropEffect = 'move';
                
                if (this !== draggedElement) {
                    const rect = this.getBoundingClientRect();
                    const next = (e.originalEvent.clientX - rect.left) / rect.width > 0.5;
                    
                    if (next) {
                        $(this).after(draggedElement);
                    } else {
                        $(this).before(draggedElement);
                    }
                }
            });
            
            $(document).on('drop', '.gallery-item', function(e) {
                e.preventDefault();
                updatePositionNumbers();
                updateGalleryOrder();
            });
            
            // Update position numbers
            function updatePositionNumbers() {
                $('#gallery-container .gallery-item').each(function(index) {
                    $(this).find('.badge').text(index + 1);
                });
            }
            
            // Update gallery order hidden input
            function updateGalleryOrder() {
                const order = [];
                $('#gallery-container .gallery-item').each(function() {
                    order.push($(this).data('image'));
                });
                $('#gallery_order').val(JSON.stringify(order));
            }
            
            // Initialize order on page load
            updateGalleryOrder();
        });
    }
</script>
@endpush
