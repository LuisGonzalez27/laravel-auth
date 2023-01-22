@extends('layouts.admin')

@section('content')

    <h1>{{$project->title}}</h1>
    <p>{!! $project->content !!}</p>
    <img src="{{ asset('storage/' . $project->cover_image) }}">
    
    @if ($project->type)
        <h3>Type: {{$project->type->name}}</h3>
    @endif

    @if($project->technologies && count($project->technologies) > 0)
        @foreach ($project->technologies as $technology)
        <span>{{$technology->name}}</span>
        @endforeach
    @endif

@endsection