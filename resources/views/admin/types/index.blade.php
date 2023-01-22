@extends('layouts.admin')

@section('content')

<h1>Types</h1>
    <a class="btn btn-success" href="{{route('admin.types.create')}}">Crea nuovo type</a>

    @if(session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Project</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach($types as $type)
                <tr>
                    <th scope="row">{{$type->id}}</th>
                    <td><a href="{{route('admin.types.show', $type->slug)}}" title="View Type">{{$type->name}}</a></td>
                    <td>{{count($type->projects)}}</td>
                    <td><a class="link-secondary" href="{{route('admin.types.edit', $type->slug)}}" title="Edit Type"><i class="fa-solid fa-pen"></i></a></td>
                    <td> 
                        <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$type->name}}"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
                
@endsection