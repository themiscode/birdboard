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

<modal name="hello-world" class="tw-p-4 tw-bg-card tw-rounded-lg">
    <h1  class="tw-font-normal tw-mb-16 tw-text-center">Let's start something new</h1>

    <div class="tw-flex">
        <div class="tw-flex-1 tw-mr-4">
            <div class="tw-mb-4">
                <label for="title" class="tw-text-sm">Title</label>
                <input type="text" name="" id="title" class="tw-border tw-border-muted-light tw-py-1 tw-px-2 tw-text-xs">
            </div>
        </div>
        <div class="tw-flex-1 tw-ml-4"></div>
    </div>
</modal>

<a href="" @click.prevent="$modal.show('hello-world')">Show Modal</a>
@endsection
