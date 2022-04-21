<?php

namespace App\Observers;

use App\Models\Material;

class MaterialObserver
{
    public function created(Material $material)
    {
        if (request()->topic_id) {
            $material->topic()->create([
                'topic_id' => request()->topic_id
            ]);
        } else {
            $material->noTopic()->create([
                'classroom_id' => request()->classroom->id
            ]);
        }
    }

    // FIXME [this will be triggered after a material is created as well]
    public function updated(Material $material)
    {
        if (request()->topic_id) {

            if ($material->noTopic) {
                $material->noTopic->delete();
                $material->topic()->create([
                    'topic_id' => request()->topic_id
                ]);
            } else {
                $material->topic->update([
                    'topic_id' => request()->topic_id
                ]);
            }
        } else {
            $material->topic->delete();
            $material->noTopic()->create([
                'classroom_id' => request()->classroom->id
            ]);
        }

    }

    public function deleted(Material $material)
    {
        $material->classworkDetail()->delete();

        $material->topic()->delete();
        $material->noTopic()->delete();
    }
}
