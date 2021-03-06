<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\ProjectTask;

class ProjectTasksController extends Controller
{
    public function update(Project $project, ProjectTask $task)
    {
        $task->setCompleted(request()->has('completed'));

        return back();
    }

    public function store(Project $project)
    {
        $attributes = request()->validate([
            'description' => ['required', 'min:3']
        ]);

        $project->addTask($attributes);

        return back();
    }
}
