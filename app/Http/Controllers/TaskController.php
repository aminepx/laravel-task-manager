<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\SubTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks=Task::where('user_id', Auth::user()->id)->get();
       
        return view('Task.index', ['tasks'=>$tasks]);
    }

    public function create()
    {
       return view('Task.create');
    }

    public function store(Request $req)
    {

       $task=new Task();
       $task->title=$req->title;
       $task->user_id=Auth::user()->id;
       $task->save();
       session()->flash('message' ,"Added successfully");
       return redirect('/');
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return back();
    }

    public function update($id)
    {
      $task=  Task::find($id);
       return view('Task.updateForm',['task'=>$task]);
    }

    public function edit(Request $req, $id)
    {
        $task=  Task::find($id);
        $task->title=$req->title;
        $task->update();
        return redirect('/');
    }
}
