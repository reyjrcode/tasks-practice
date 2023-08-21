<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\Project;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    //php artisan make:controller MembersController
    // php artisan route:list
    // {{DOMAIN}}/api/projects/1/members
    public function index(Request $request, Project $project)
    {
        $members = $project->members;

        return new UserCollection($members);
    }
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $project->members()->syncWithoutDetaching([$request->user_id]);

        $members = $project->members;

        return new UserCollection($members);
        // php artisan tinker
        // User::factory()->create()
        
    }
}