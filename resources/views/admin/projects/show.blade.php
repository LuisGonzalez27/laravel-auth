@extends('layouts.admin')

@section('content')

    <h1>{{$project->name}}</h1>
    @if ($project->category)
    <h5>Category id : {{$project->category->name}}</h5>
    @endif
    <p>{{$project->content}}</p>
    <img width="400" src="{{ asset('storage/' . $project->cover_image) }}">
    @if($project->technologies && count($project->technologies ) > 0 )
        @foreach ($project->technologies as $technology)
            <span>{{$technology->name}}</span>
        @endforeach
    @endif

@endsection