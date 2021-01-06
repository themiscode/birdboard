<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

use Redirect;

class ProjectsController extends Controller
{
    public function index() {
        $projects = auth()->user()->projects;
        return view('projects.index', compact('projects'));
    }

    /**
     * Undocumented function
     *
     * @param Project $project
     * @return void
     * @throws AuthorizationException
     */
    public function show(Project $project) {

        $this->authorize('update', $project);

        return view('projects.show', compact('project'));

    }


    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }


    public function store(){


        $project = auth()->user()->projects()->create($this->validateRequest());

        return redirect($project->path());
    }


    public function create()
    {
        return view('projects.create');
    }

    /**
     * Undocumented function
     *
     * @param ProjectUpdateRequest $request
     * @param Project $project
     *
     * @return RedirectResponse
     *
     *
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect($project->path());
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable'
        ]);
    }
}
