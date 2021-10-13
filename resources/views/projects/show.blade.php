@extends('layouts.app')

@section('content')

<header class="tw-flex tw-items-center tw-mb-3 tw-py-4">
    <div class="tw-flex tw-justify-between tw-w-full tw-items-end">

        <p class="tw-text-default tw-text-sm tw-font-normal tw-mb-0">
            <a href="/projects" class="tw-text-default tw-text-sm tw-font-normal tw-no-underline">My Projects</a> / {{ $project->title }}
        </p>

        <div>
           @foreach ($project->members as $member)
               <img
                src="{{ gravatar_url($member->email) }}"
                alt="{{ $member->name }}'s avatar'"
                class="tw-rounded-full tw-w-8 tw-mr-2">
           @endforeach

           <img
            src="{{ gravatar_url($project->owner->email) }}"
            alt="{{ $project->owner->name }}'s avatar'"
            class="tw-rounded-full tw-w-8 tw-mr-2">

            <a href="{{ $project->path().'/edit' }}" class="tw-ml-4 button">Edit Project</a>

        </div>

    </div>

</header>

<main>
    <div class="lg:tw-flex tw--mx-3">
        <div class="lg:tw-w-3/4 tw-px-3 tw-mb-6">
            <div class="tw-mb-8">
                <h2 class="tw-text-lg tw-text-default tw-font-normal">Tasks</h2>
                @foreach ($project->tasks as $task)
                    <div class="card tw-mb-3">
                        <form action="{{ $task->path() }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="tw-flex">
                                <input name="body" value="{{ $task->body }}" class="tw-bg-card tw-text-default tw-w-full tw-border-none focus:tw-ring-2 focus:tw-ring-blue
                                 {{ $task->completed ? 'tw-text-default' : ''}}" >
                                <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
                            </div>
                        </form>

                    </div>
                @endforeach

                <div class="card tw-mb-3">
                    <form action="{{ $project->path() . '/tasks'}}" method="POST">
                        @csrf
                        <input class="tw-bg-card tw-text-default tw-w-full tw-border-none" type="text" name="body" id="" placeholder="Add a new task">
                    </form>

                </div>

            </div>

            <div>
                <h2 class="tw-text-lg tw-text-default tw-font-normal">General Notes</h2>
                <form action="{{ $project->path() }}" method="post">
                    @csrf
                    @method('PATCH')
                    <textarea name="notes" class="card tw-w-full tw-mb-4" style="min-height: 200px;">{{ $project->notes }}</textarea>
                    <button type="submit" class="button tw-border-none">Save</button>
                </form>
                @include('projects.errors')
            </div>
        </div>


        <div class="lg:tw-w-1/4 tw-px-3 tw-mt-9">
            @include('projects.card')
            @include('projects.activity.card')
            @can('manage', $project)
                @include('projects.invite')
            @endcan
        </div>
    </div>
</main>



@endsection
