<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (str_contains($this->classwork_type, 'Material')) {
            return collect(new MaterialResource($this->classwork));
        }

        return collect(new TaskResource($this->classwork));
    }
}
