@extends('layouts.app')

@section('content')


<header class="tw-flex tw-items-center tw-mb-3 tw-py-4">
    <div class="tw-flex tw-justify-between tw-w-full tw-items-end">

        <h2 class="tw-text-grey tw-text-sm tw-font-normal">My projects</h2>

        <a href="/projects/create" class=" button">New Project</a>

    </div>

</header>


<main class="tw-flex tw-flex-wrap tw--mx-3">

    @forelse ($projects as $project)
    <div class="tw-w-1/3 tw-px-3 tw-pb-6">
        @include('projects.card')
    </div>
    @empty
    <div>No projects found!</div>
    @endforelse

</main>

@endsection
