@extends('layouts.admin')

@section('content')

<a href="{{route('admin.projects.create')}}">
    <button type="button" class="btn btn-outline-secondary">
        <i class="fa-solid fa-square-plus"></i> NEW PROJECT  <!-- READ -->
    </button>
</a>

<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">ACTION</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            @csrf
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->title}}</td>
                <td>{{$project->category}}</td>
                <td>
                    <a href="{{route('admin.projects.show', $project->slug)}}">
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-eye"></i>  <!-- READ -->
                        </button>
                    </a>
                    <a href="{{route('admin.projects.edit', $project->slug)}}">
                        <button type="button" class="btn btn-outline-primary">
                            <i class="fa-solid fa-pencil"></i>   <!-- EDIT -->
                        </button>
                    </a>
                    <form class="form_delete_project d-inline" action="{{route('admin.projects.destroy', ['project' => $project->slug])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>     <!-- DELETE -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- MODALE -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Confermi di voler eliminare l'elemento selezionato?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger">Conferma eliminazione</button>
        </div>
        </div>
    </div>
</div>

@endsection