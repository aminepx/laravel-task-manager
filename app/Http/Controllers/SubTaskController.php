<?php

namespace App\Http\Controllers;

use App\Models\SubTask;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{
public function store(Request $req)
{
    $subtask=new SubTask();
    $subtask->content=$req->content;
    $subtask->task_id=$req->task_id;
    $subtask->save();
    return back();
}

public function delete($id)
{
    SubTask::find($id)->delete();
    return back();
}

public function editSub(Request $req, $id)
{
   $sub=SubTask::find($id);
   $sub->content=$req->content;
   $sub->update();
   return back();
}
}
