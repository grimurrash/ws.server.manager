<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'manager'=>$this->manager->login,
            'tasks'=>TaskResource::collection($this->tasks),
            'date' => date('d.m.Y H:i',strtotime($this->created_at)),
            'workers'=> $this->workers()
        ];
    }
}
