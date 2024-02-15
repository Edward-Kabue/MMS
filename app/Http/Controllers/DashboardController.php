<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // view posts created by the logged in user  
        $tasks = auth()->user()->tasks;

        // check if $tasks is not null before using foreach loop
        if ($tasks) {
            // return the dashboard view and pass the tasks to the view
            return view('dashboard', compact('tasks'));
        } else {
            // handle the case when $tasks is null
            return view('dashboard', compact('tasks'))->withErrors('No tasks found.');
        }
    }
}
