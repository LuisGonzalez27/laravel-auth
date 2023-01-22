@extends('layouts.admin')

@section('content')

    <h1>Create Project</h1>
    <div class="row bg-white">
        <div class="col-12">
            <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                  <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required maxlength="150" minlength="3">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">* Minimo 3 caratteri e massimo 150 caratteri</div>
                  </div>

                  <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content"></textarea>
                  </div>

                  <div class="mb-3">
                    <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                    <label for="create_cover_image" class="form-label">Immagine</label>
                    <input type="file" name="cover_image" id="create_cover_image" class="form-control  @error('cover_image') is-invalid @enderror">
                    @error('cover_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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

                  <div class="mb-3">
                    <label for="technologies" class="form-label">Technologies</label>
                    <select multiple class="form-select" name="technologies[]" id="technologies">
                        {{-- <option value="">Seleziona technology</option> --}}
                        @forelse ($technologies as $technology)
                          <option value="{{$technology->id}}">{{$technology->name}}</option>
                        @empty
                            <option value="">No technology</option>
                        @endforelse
                    </select>
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