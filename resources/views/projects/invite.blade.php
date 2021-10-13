<div class="card tw-flex tw-flex-col mt-3">
    <h3 class="tw-font-normal tw-text-xl tw-py-4 tw--ml-5 tw-border-0 tw-mb-3 tw-border-l-4 tw-border-solid tw-border-blue-light tw-pl-4">
        Invite a User
    </h3>


    <form method="POST" action="{{ $project->path() . '/invitations'}}">
        @csrf

        <div class="tw-mb-3">
            <input type="email" name="email" class="tw-border tw-border-grey tw-rounded tw-w-full tw-px-3 tw-py-2" placeholder="Email address">
        </div>
        <button type="submit" class="button tw-border-none">Invite</button>
    </form>
    @include('projects.errors', ['bag' => 'invitations'])
</div>
