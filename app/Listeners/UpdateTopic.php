<?php

namespace App\Listeners;

use App\Events\ClassworkUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTopic
{
    public function handle(ClassworkUpdated $event)
    {
        // FIXME [you are violating design principles]
        if (request()->topic_id) {

            if ($event->classwork->noTopic) {
                $event->classwork->noTopic->delete();
                $event->classwork->topic()->create([
                    'topic_id' => request()->topic_id
                ]);
            } else {
                $event->classwork->topic->update([
                    'topic_id' => request()->topic_id
                ]);
            }
        } elseif (!request()->topic_id && $event->classwork->topic) {
            // FIXME [imagine when topic_id isn't included in the form request - this condition
            // still holds true which shouldn't be correct because user does not wish to change topic]
            $event->classwork->topic->delete();
            $event->classwork->noTopic()->create([
                'classroom_id' => request()->classroom->id
            ]);
        }
    }
}
