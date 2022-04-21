<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassworkResource extends JsonResource
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
            'noTopic' => [
                'listItems' => NoTopicClassworkResource::collection($this->noTopicClassworks)
            ],
            'topics' => TopicResource::collection($this->topics),
        ];
    }
}
