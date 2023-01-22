@extends('layouts.admin')

@section('content')
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
  </div>
    <h1>Edit Project: {{$project->title}}</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{route('admin.projects.update', $project->slug)}}" enctype="multipart/form-data" method="POST" class="p-4">
                    @csrf
                    @method('PUT')
                      <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $project->title)}}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content">{{old('content', $project->content)}}</textarea>
                      </div>

                      <div class="d-flex">
                        <div class="media me-4">
                            <img class="shadow" width="250" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->title}}">
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
                        <label for="type_id" class="form-label">Seleziona tipo</label>
                        <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                          <option value="">Select type</option>
                          @foreach ($types as $type)
                              <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{$type->name}}</option>
                          @endforeach
                        </select>
                        @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>

                      {{-- <div class="mb-3">
                        <label for="technologies" class="form-label">Technologies</label>
                        <select multiple class="form-select" name="technologies[]" id="technologies">
                            <option value="">Seleziona technology</option>
                            @forelse ($technologies as $technology)
                              @if($errors->any())
                              <option value="{{$technology->id}}" {{in_array($technology->id , old('technologies[]')) ? 'selected': ''}}>{{$technology->name}}</option>
                              @else
                              <option value="{{$technology->id}}" {{$project->technologies->contains($technology->id) ? 'selected': ''}}>{{$technology->name}}</option>
                            @endif
                            @empty
                                <option value="">No technology</option>
                            @endforelse
                        </select>
                      </div> --}}
                      <div class="mb-3">
                        @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                          @if (old("technologies"))
                                <input type="checkbox" class="form-check-input" id="{{$technology->slug}}" name="technologies[]" value="{{$technology->id}}" {{in_array( $technology->id, old("technologies", []) ) ? 'checked' : ''}}>
                            @else
                              <input type="checkbox" class="form-check-input" id="{{$technology->slug}}" name="technologies[]" value="{{$technology->id}}" {{$project->technologies->contains($technology) ? 'checked' : ''}}>
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

        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
        </script>
        <script type="text/javascript">
          bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>

@endsection