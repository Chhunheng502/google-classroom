<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoTopicClassworkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if(get_classwork_name($this->classwork_type) == 'material') {
            return new MaterialResource($this->classwork);
        }

        return new TaskResource($this->classwork);
    }
}
