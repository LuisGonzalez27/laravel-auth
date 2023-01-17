@extends('layouts.admin')

@section('content')

    <h1>Technologies</h1>
    <a class="btn btn-success" href="">Crea nuova technology</a>
    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type</th>
                <th scope="col">Number of projects</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($technologies as $technology)
                    <tr>
                        <th scope="row">{{$technology->id}}</th>
                        <td>
                            {{$technology->name}}
                            {{-- <a href="{{route('admin.technologies.show', $technology->slug)}}" title="View Category">{{$technology->name}}</a> --}}
                        </td>
                        {{-- <td>{{count($technology->projects) > 0 ? count($technology->projects) : 0}}</td> --}}
                        <td>
                            {{-- <a class="link-secondary" href="{{route('admin.technologies.edit', $technology->slug)}}" title="Edit Category"><i class="fa-solid fa-pen"></i></a> --}}
                        </td>
                        <td> 
                            <form action="{{route('admin.technologies.destroy', $technology->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button btn btn-danger ms-3" data-item-name="{{$technology->name}}"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
    
@endsection