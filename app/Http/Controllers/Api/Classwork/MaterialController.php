<?php

namespace App\Http\Controllers\Api\Classwork;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Http\Resources\MaterialResource;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(MaterialRequest $request)
    {
        $material = Material::create([
            'classroom_id' => $request->classroom_id
        ]);

        $material->classworkDetail()->create($request->validated());

        if ($request->topic_id) {
            $material->topic()->create([
                'topic_id' => $request->topic_id
            ]);
        }

        return new MaterialResource($material);
    }

    public function show(Material $material)
    {

    }
}
