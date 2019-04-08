<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment_id'=>$this->id,
            'user'=>$this->user->login,
            'comment' => $this->comment,
            'date' => date('d.m.Y H:i',strtotime($this->created_at))
        ];
    }
}
