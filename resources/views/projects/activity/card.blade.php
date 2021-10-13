<div class="card tw-mt-3">
    <ul class="tw-text-xs tw-list-none tw-p-0 tw-mb-0">
        @foreach ($project->activity as $activity)
            <li class="{{ $loop->last ? '' : 'tw-mb-1' }}">
                @include("projects.activity.{$activity->description}")
                <span class="tw-text-grey">{{ $activity->created_at->diffForHumans(null, true) }}</span>
            </li>
        @endforeach
    </ul>
</div>
