<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => get_classwork_name($this->classworkDetail->classwork_type),
            'title' => $this->classworkDetail->title,
            'description' => $this->classworkDetail->description,
            'attachments' => $this->classworkDetail->attachments,
            'topic_id' => $this->classworkDetail->topic_id
        ];
    }
}
