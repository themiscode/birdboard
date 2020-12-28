@extends('layouts.app')

@section('content')

<h1>Create a Project</h1>


<form method="POST" action="/projects">
    
    @csrf
    <div>
        
        <label for="title">Title</label> 
        <div>   
            <input type="text" name="title" id="title" placeholder="Title">
        </div>
        
    </div>
    
    
    <div>
        <label for="description">Description</label>
        <div>
            <textarea name="description" id="description"></textarea>
        </div>
    </div>
    
    <div>
        <button type="submit">Create Project</button>
        <a href="/projects">Cancel</a>
    </div>
    
    
</form>


@endsection