<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\Project;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    //php artisan make:controller MembersController
    // php artisan route:list
    public function index(Request $request, Project $project)
    {
        $members = $project->members;

        return new UserCollection($members);
    }
}