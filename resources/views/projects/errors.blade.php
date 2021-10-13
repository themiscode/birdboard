@if ($errors->{ $bag ?? 'default' }->any())

    <ul class="field tw-mt-6 tw-list-reset tw-list-none tw-px-0">
        @foreach ($errors->{ $bag ?? 'default' }->all() as $error)
            <li class="tw-text-sm tw-text-red">{{ $error }}</li>
        @endforeach
    </ul>
@endif
