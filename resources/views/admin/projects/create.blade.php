@extends('layouts.admin')

@section('content')

        <h1>Create Project</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{route('admin.projects.store')}}" method="POST"  enctype="multipart/form-data" class="p-4">
                    @csrf
                      <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        required maxlength="150" minlength="3">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo tre caratteri e massimo 150 caratteri</div>
                      </div>
                      <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content"></textarea>
                      </div>

                      <div class="mb-3">
                        <img id="uploadPreview" width="200" src="https://via.placeholder.com/300x200">
                        <label for="create_cover_image" class="form-label">Immagine</label>
                        <input type="file" name="cover_image" id="create_cover_image" class="form-control  @error('cover_image') is-invalid @enderror">
                        @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Massimo 5Mb per immagine</div>
                      </div>

                      <div class="mb-3">
                        <label for="category_id" class="form-label">Seleziona categoria</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Selezione categoria</option>
                          @foreach ($categories as $category)
                              <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{$category->name}}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="technologies" class="form-label">Technologies</label>
                        <select multiple class="form-select" name="technologies[]" id="technologies">
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
    
@endsection