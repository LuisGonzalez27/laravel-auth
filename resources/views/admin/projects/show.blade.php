@extends('layouts.admin')

@section('content')

    <h1>{{$project->name}}</h1>
    <p>{{$project->content}}</p>
    <img width="400" src="{{ asset('storage/' . $project->cover_image) }}">

@endsection