<div class="card" style="height: 200px">
    <h3 class="tw-font-normal tw-text-xl tw-py-4 tw--ml-5 tw-border-0 tw-mb-3 tw-border-l-4 tw-border-solid tw-border-blue-light tw-pl-4">
        <a href="{{ $project->path() }}" class="tw-text-black">{{ $project->title }}</a>
    </h3>
    <div class="tw-text-grey">{{ str_limit($project->description, 100) }}</div>
</div>

