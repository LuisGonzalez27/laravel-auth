@extends('layouts.admin')

@section('content')

    <h1>Technologies</h1>
    <form action="{{route('admin.technologies.store')}}" method="post" class="d-flex align-items-center">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="
            Add a technology name here " aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add new technology</button>
        </div>
    </form>
    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Technology</th>
                <th scope="col">Projects</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($technologies as $technology)
                <tr>
                    <th scope="row">{{$technology->id}}</th>
                    <td>
                        <form id="technology-{{$technology->id}}" action="{{route('admin.technologies.update', $technology->slug)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input class="border-0 bg-transparent" type="text" name="name" value="{{old('name', $technology->name)}}">
                        </form>

                    </td>

                    <td>
                        {{$technology->projects && count($technology->projects) > 0 ? count($technology->projects) : 0}}
                    </td>

                    <td>
                        <form action="{{route('admin.technologies.destroy', $technology->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$technology->name}}"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
    
@endsection