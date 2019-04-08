<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Task $task)
    {
        $user = User::isAuth($request->bearerToken());
        if ($task->worker_id == $user->id || $task->project->manager_id == $user->id) {
            return response()->json([
                'status' => true,
                'comments' => $task->comments
            ])->setStatusCode(200, 'Comment List');
        } else {
            return response()->json([
                'status' => false,
                'message' => ['permission' => 'Нет прав']
            ])->setStatusCode(403, 'Forbidden');
        }
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        $user = User::isAuth($request->bearerToken());
        if ($task->worker_id == $user->id || $task->project->manager_id == $user->id) {
            $valid = Validator::make($request->all(), [
                'comment' => ['required', 'string'],
            ], [
                'comment.required' => 'Введите комментарий',
            ]);
            if (!$valid->fails()) {
                Comment::create([
                    'task_id'=>$task->id,
                    'comment' => $request->comment,
                    'user_id'=>$user->id
                ]);
                return response()->json([
                    'status'=>true,
                ])->setStatusCode(200,'Successful');
            } else {
                return response()->json(['status' => false, 'message' => $valid->errors()])->setStatusCode(400, 'Create Errors');
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => ['permission' => 'Нет прав']
            ])->setStatusCode(403, 'Forbidden');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
