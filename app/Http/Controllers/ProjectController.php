<?php

namespace App\Http\Controllers;



use App\Http\Requests\StorePorjectRequest;

use App\Http\Requests\UpdatePorjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectCollection;
use Spatie\QueryBuilder\QueryBuilder;

class ProjectController extends Controller
{
    //

    public function index(Request $request)
    {
        $projects = QueryBuilder::for(Project::class)
            ->allowedIncludes('tasks')
            ->paginate();

        return new ProjectCollection($projects);
    }
    public function store(StorePorjectRequest $request)
    {
        $validated = $request->validated();

        $project = Auth::user()->projects()->create($validated);

        return new ProjectResource($project);
    }

    public function show(Request $request, Project $project)
    {
        // return new ProjectResource($project);
        return (new ProjectResource($project))->load('tasks')
        ->load('tasks')
        ->load('members');
        ;
    }

    public function update(UpdatePorjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        $project->update($validated);

        return new ProjectResource($project);
    }
    public function destroy(Request $request, Project $project)
    {
        $project->delete();
        return response()->noContent();
        // php artisan tinker
        // $u = User::factory()->create()
        // $p = Project::factory()-> for ($u, 'creator')->create()
    }
}