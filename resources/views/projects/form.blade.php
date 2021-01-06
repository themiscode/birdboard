@csrf

<div>

    <label for="title">Title</label>
    <div>
        <input type="text" name="title" id="title" placeholder="Title" value="{{ $project->title }}" required>
    </div>

</div>


<div>
    <label for="description">Description</label>
    <div>
        <textarea name="description" id="description" required>{{ $project->description }}</textarea>
    </div>
</div>

<div>
    <button type="submit">{{ $buttonText }}</button>
    <a href="{{ $project->path() }}">Cancel</a>
</div>



@if ($errors->any())

    <div class="field tw-mt-6">
        @foreach ($errors->all() as $error)
            <li class="tw-text-sm tw-text-red">{{ $error }}</li>
        @endforeach

        </div>
@endif

