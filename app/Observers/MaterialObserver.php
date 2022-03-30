<?php

namespace App\Observers;

use App\Models\Material;

class MaterialObserver
{
    public function deleted(Material $material)
    {
        $material->classworkDetail()->delete();
    }
}
