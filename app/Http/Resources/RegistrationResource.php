<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
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
            'user_id' => $this->user_id,
            'classroom_id' => $this->classroom_id,
            'role' => $this->role,
            'classroom' => new ClassroomResource($this->classroom),
            'admin' => $this->when($this->role === 'student',
                collect(new UserResource($this->classroom->admin))->except(['email'])
            ),
        ];
    }
}
