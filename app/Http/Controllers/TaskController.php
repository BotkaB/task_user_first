<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //index fg
    public function index()
    {
        $tasks= response()->json(Task::All());
        return $tasks;
    }

    public function show($id)
    {
        $tasks= response()->json(Task::Find($id));
        return $tasks;
    }

    public function store(Request $request )
    {
        $tasks= new Task();
        $tasks->title=$request->title;
        $tasks->description=$request->description;
        $tasks->end_date=$request->end_date;
        $tasks->user_id=$request->user_id;
        $tasks->status=$request->status;
        $tasks->save();
    }

    public function update(Request $request,$id)
    {
        $tasks= Task::find($id);
        $tasks->title=$request->title;
        $tasks->description=$request->description;
        $tasks->end_date=$request->end_date;
        $tasks->user_id=$request->user_id;
        $tasks->status=$request->status;
        $tasks->save();
    }
}
