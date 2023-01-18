@extends('layouts.admin')

@section('content')

<h1>Edit Post: {{$project->name}}</h1>
<div class="row bg-white">
    <div class="col-12">
        <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            @method('PUT')
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $project->name)}}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content">{{old('content', $project->content)}}</textarea>
              </div>
              
                <div class="d-flex">
                    <div class="media me-4">
                        <img class="shadow" width="150" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Replace project image</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" >
                        @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                  <label for="category_id" class="form-label">Seleziona categoria</label>
                  <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{$category->name}}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                {{-- <div class="mb-3">
                  <label for="technologies" class="form-label">Seleziona </label>
                  <select name="technologies" id="technologies" class="form-control @error('technologies') is-invalid @enderror">
                    <option value="">Select</option>
                    @foreach ($technologies as $technology)
                        <option value="{{$technology->id}}" {{ $technology->id == old('technologies[]') ? 'selected' : '' }}>{{$technology->name}}</option>
                    @endforeach
                  </select>
                  @error('technologies')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div> --}}

                <div class="mb-3">
                  <h5>Select</h5>
                  @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">

                        @if (old("technologies"))
                            <input type="checkbox" class="form-check-input" id="{{$technology->slug}}" name="technologies[]" value="{{$technology->id}}" {{in_array( $technology->id, old("technologies", []) ) ? 'checked' : ''}}>
                        @else
                            {{-- <input type="checkbox" class="form-check-input" id="{{$technology->slug}}" name="technologies[]" value="{{$technology->id}}" {{$project->technologies->contains($technology) ? 'checked' : ''}}> --}}
                        @endif
                        <label class="form-check-label" for="{{$technology->slug}}">{{$technology->name}}</label>

                    </div>
                  @endforeach
                  @error('technologies')
                  <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>

              <button type="submit" class="btn btn-success">Submit</button>
              <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
</div>

    
@endsection