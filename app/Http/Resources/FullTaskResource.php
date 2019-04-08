<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FullTaskResource extends JsonResource
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
            'text'=>$this->text,
            'worker'=>new WorkerResource($this->worker),
            'comments'=> CommentResource::collection($this->comments),
            'date' => date('d.m.Y H:i',strtotime($this->created_at))
        ];
    }
}
