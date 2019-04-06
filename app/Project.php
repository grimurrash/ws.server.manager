<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $guarded = [];

    public function manager()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function workers()
    {
        $workers = [];
        foreach ($this->tasks as $task) {
            $worker = [
                'id' => $task->worker->id,
                'login' => $task->worker->login
            ];
            if (!in_array($worker, $workers)) {
                $workers[] = $worker;
            }
        }
        return $workers;
    }
}
