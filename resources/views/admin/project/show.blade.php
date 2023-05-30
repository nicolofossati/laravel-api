@extends('layouts.admin')

@section('content')

    <div class="card text-center">
        <div class="card-header">
            Your project
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$project->title}}</h5>
            <p class="card-text">{{$project->description}}</p>
            <p class="card-text">Client: {{$project->client}}</p>
            <p class="card-text">Category: {{$project->category}}</p>
            <p class="card-text">Type: {{($project->type)==null?'Type doesn\'t exists':$project->type->name}}</p>
            @foreach ($project->technologies as $technology)
                <span class="badge rounded-pill text-bg-primary">{{$technology->name}}</span>
            @endforeach
        </div>
        <div class="card-footer text-muted d-flex justify-content-center">
            <p class="me-5">Creation date: {{$project->creation_date}}</p>
            <p class="ms-5">Completion date: {{$project->completion_date}}</p>
        </div>
    </div>

@endsection