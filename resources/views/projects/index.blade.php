@extends('layouts.app')

@section('content')
    

    <div class="tw-flex tw-items-center">

    <a href="/projects/create">New Project</a>
    </div>


    <div class="tw-flex">

        @forelse ($projects as $project)

            <div class="tw-bg-white tw-mr-4 tw-rounded tw-shadow tw-w-1/3 tw-p-5" style="height: 200px">
                <h3 class="tw-font-normal tw-text-xl tw-py-4">{{ $project->title }}</h3>
                <div class="tw-text-grey">{{ str_limit($project->description, 100) }}</div>
            </div>
        @empty
            <div>No projects found!</div>
        @endforelse
    
    </div>

@endsection