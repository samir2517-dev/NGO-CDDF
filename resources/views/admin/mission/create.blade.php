@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Mission and Vision </h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('mission.vision.store') }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label for="vision" class="form-label">Vision</label>
                            <textarea id="vision" name="vision" class="form-control summernote @error('vision') is-invalid @enderror" rows="10">{{ old('vision', $mission->vision ?? '') }}</textarea>
                            @error('vision')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="mission" class="form-label">Mission</label>
                            <textarea id="mission" name="mission" class="form-control summernote @error('mission') is-invalid @enderror" rows="10">{{ old('mission', $mission->mission ?? '') }}</textarea>
                            @error('mission')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="values" class="form-label">Our Values</label>
                            <textarea id="values" name="values" class="form-control summernote @error('values') is-invalid @enderror" rows="10">{{ old('values', $mission->values ?? '') }}</textarea>
                            @error('values')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Vision:</h6>
                        <p class="text-justify">
                            {{ isset($mission->vision)? $mission->vision:'' }}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <h6>Mission:</h6>
                        <p class="text-justify">
                            {{ isset($mission->mission)? $mission->mission:'' }}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <h6>Our Values:</h6>
                        <p class="text-justify">
                            {{ isset($mission->values)? $mission->values:'' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
