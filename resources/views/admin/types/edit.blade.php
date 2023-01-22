@extends('layouts.admin')

@section('content')
    <h1>Edit Type: {{$type->name}}</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{route('admin.types.update', $type->slug)}}" enctype="multipart/form-data" method="POST" class="p-4">
                    @csrf
                    @method('PUT')
                      <div class="mb-3">
                        <label for="name" class="form-label">Titolo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $type->name)}}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>

                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>

@endsection