@extends('layouts.app')

@section('content')

    <ul>
        @foreach ($projects as $project)
            <li>{{$project->name}}</li>
        @endforeach
    </ul>
    
@endsection