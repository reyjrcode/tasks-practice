<?php

namespace App\Http\Controllers;



use App\Http\Requests\StorePorjectRequest;

use App\Http\Requests\UpdatePorjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function store(StorePorjectRequest $request)
    {
        $validated = $request->validated();

        $project = Auth::user()->projects()->create($validated);

        return new ProjectResource($project);
    }

    public function show(Request $request, Project $project)
    {
        return new ProjectResource($project);
    }

    public function update(UpdatePorjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        $project->update($validated);

        return new ProjectResource($project);
    }
}