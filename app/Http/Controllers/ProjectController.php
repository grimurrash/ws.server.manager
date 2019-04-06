<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::isAuth($request->bearerToken());
        return response()->json([
            'status'=>true,
            'projects'=> ProjectResource::collection($user->projects)
        ])->setStatusCode(200,'Project List');
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
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ], [
            'name.required' => 'Укажите название проекта',
            'description.required' => 'Укажите описание проекта'
        ]);
        if (!$valid->fails()) {
            $project = Project::create([
                'name' => $request->name,
                'description' => $request->description,
                'manager_id' => User::isAuth($request->bearerToken())->id
            ]);
            return response()->json([
                'status'=>true,
                'id'=>$project->id
            ])->setStatusCode(200,'Successful');
        } else {
            return response()->json(['status' => false, 'message' => $valid->errors()])->setStatusCode(400, 'Create Errors');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return response()->json([
            'status'=>true,
            'project'=>new ProjectResource($project)
        ])->setStatusCode(200,'Project View');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
