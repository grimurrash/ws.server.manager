<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded  = [];
    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
    public function worker(){
        return $this->belongsTo(User::class, 'worker_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
