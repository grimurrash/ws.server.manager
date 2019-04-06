<?php

namespace App\Http\Controllers;

use App\Http\Resources\FullTaskResource;
use App\Http\Resources\TaskResource;
use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $tasks = $project->tasks;
        return response()->json([
            'status'=>true,
            'tasks' => TaskResource::collection($tasks)
        ])->setStatusCode('200','Task List');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {

        if (User::isAuth($request->bearerToken()) == $project->manager_id){
            $valid = Validator::make($request->all(), [
                'text' => ['required', 'string'],
                'worker_id' => ['required', 'string', 'exists:users,id'],
            ], [
                'text.required' => 'Укажите описание задачи',
                'worker_id.required' => 'Укажите прикрепленного сотрудника',
                'worker_id.exists' => 'Сотрудника с таким id не существует'
            ]);
            if (!$valid->fails()) {
                $task = Task::create([
                    'text' => $request->text,
                    'worker_id' => $request->worker_id,
                    'project_id'=>$project->id
                ]);
                return response()->json([
                    'status'=>true,
                    'id'=>$task->id
                ])->setStatusCode(200,'Successful');
            } else {
                return response()->json(['status' => false, 'message' => $valid->errors()])->setStatusCode(400, 'Create Errors');
            }
        }else{
            return response()->json([
                'status'=>false,
                'message'=>['permission'=>'Нет прав']
            ])->setStatusCode(403,'Forbidden');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response()->json([
            'status'=>true,
            'task'=>new FullTaskResource($task)
        ])->setStatusCode(200,'Task View');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
