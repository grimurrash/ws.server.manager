<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];
    public static function isAuth($token)
    {
        $user = User::where('token',$token)->first();
        if (!is_null($user)){
            return $user;
        }else{
            return response()->json(['status'=>false, 'message'=>['auth'=>'Unauthorized']])->setStatusCode('404','Unauthorized');
        }
    }
    public function generateToken(){
        $this->token = str_random(60);
        $this->save();
        return $this->token;
    }
    public function projects(){
        if ($this->role == 'manager'){
            return $this->hasMany(Project::class,'manager_id');
        }else{
            return $this->hasManyThrough(Project::class, Task::class,'worker_id');
        }
    }
}
