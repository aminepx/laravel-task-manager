<?php

namespace App\Models;

use App\Models\SubTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    public function sub_tasks()
    {
     return  $this->hasMany(SubTask::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
