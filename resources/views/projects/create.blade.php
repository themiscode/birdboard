@extends('layouts.app')

@section('content')

    <h1>Create a project</h1>

    <form method="POST" action="/projects">


        @include('projects.form', [
            'project' => new App\Models\Project,
            'buttonText' => 'Create Project'
        ])

    </form>

@endsection
