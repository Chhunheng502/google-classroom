<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    protected $taskType;

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
            'type' => $this->taskType = get_classwork_name($this->taskDetail->task_type),
            'title' => $this->classworkDetail->title,
            'description' => $this->classworkDetail->description,
            $this->mergeWhen(
                $this->hasMergeableType(),
                $this->getAttributes()
            ),
            'attachments' => $this->classworkDetail->attachments,
            'points' => $this->taskDetail->points,
            'due_date' => $this->taskDetail->due_date,
            'topic_id' => $this->classworkDetail->topic_id
        ];
    }

    public function hasMergeableType()
    {
        return collect(['quiz', 'saq', 'mcq'])
                ->contains($this->taskType);
    }

    // NOTE [need improvement on styling.]
    public function getAttributes()
    {
        if ($this->taskType === 'quiz') {
            return [
                'url' => $this->url
            ];
        } else if ($this->taskType === 'saq') {
            return [
                'question' => $this->question
            ];
        } else if ($this->taskType === 'mcq') {
            return [
                'options' => $this->options
            ];
        }
    }
}
