@extends('layouts.admin')

@section('content')

    <h1>{{$type->name}}</h1>
    <ul>
        @foreach ($type->projects as $project)
            <li>{{$project->title}}</li>
        @endforeach
    </ul>

@endsection