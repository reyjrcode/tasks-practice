<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    //
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    public function index(Request $request)
    {
        // return new TaskCollection(Task::paginate());
        // composer require spatie/laravel-query-builder
        // php artisan tinker
        // $t = Task::find(1)
        // $t->is_done= true
        // $t->save()

        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters('is_done')
            ->defaultSort('-created_at')
            ->allowedSorts(['title', 'is_done', 'created_at'])
            ->paginate();
        return new TaskCollection($tasks);
    }
    public function show(Request $request, Task $task)
    {
        // {{DOMAIN}}/api/tasks/1
        // php artisan route:list
        return new TaskResource($task);
    }
    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();
        // $task = Task::create($validated);
        $task = Auth::user()->tasks()->create($validated);
        return new TaskResource($task);
    }
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $validated = $request->validated();
        $task->update($validated);
        return new TaskResource($task);
        // {{DOMAIN}}/api/tasks/3
    }
    public function destroy(Request $request, Task $task)
    {
        $task->delete();
        return response()->noContent();
    }
}