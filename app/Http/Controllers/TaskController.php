<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    public function index (){

        $tasks = Task::all();

        //dd($tasks);
        return view ('tasks.index', compact('tasks'));
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required'
        ]);

        Task::create([
            'title' => $request->title
        ]);

        session()->flash('msg','Task has been created');

        return redirect('/');
         
    }

    public function destory ($id) {

        //dd($id);
        Task::destroy($id);

        return redirect()->back()->with('msg','Task has been deleted');

    }
}
