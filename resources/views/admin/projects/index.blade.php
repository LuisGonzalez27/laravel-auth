@extends('layouts.app')

@section('content')

    <ul>
        @foreach ($projects as $project)
            <li>
                <a class="btn btn-primary text-white btn-sm" href="{{route('admin.projects.show', $project->slug)}}" title="View Post">{{$project->name}}</a>
            </li>
        @endforeach
    </ul>
    
@endsection