<div class="card tw-flex tw-flex-col" style="height: 200px">
    <h3 class="tw-twxt-default tw-font-normal tw-text-xl tw-py-4 tw--ml-5 tw-border-0 tw-mb-3 tw-border-l-4 tw-border-solid tw-border-blue-light tw-pl-4">
        <a href="{{ $project->path() }}" class="tw-text-default">{{ $project->title }}</a>
    </h3>
    <div class="tw-text-default tw-mb-4 tw-flex-1">{{ str_limit($project->description, 100) }}</div>
    @can('manage', $project)
        <footer>
            <form method="POST" action="{{ $project->path() }}" class="tw-text-right">
                @method('DELETE')
                @csrf
                <button type="submit" class="tw-text-xs tw-border-none button">Delete</button>
            </form>
        </footer>
    @endcan
</div>

