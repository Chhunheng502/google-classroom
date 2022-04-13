<?php

namespace App\Http\Controllers\Api\Classwork;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Http\Resources\MaterialCollection;
use App\Http\Resources\MaterialResource;
use App\Models\Classroom;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MaterialController extends Controller
{
    public function index(Classroom $classroom)
    {
        return new MaterialCollection(
            $classroom->materials
        );
    }

    public function store(MaterialRequest $request, Classroom $classroom)
    {
        $material =  $classroom->materials()->create();

        $material->classworkDetail()->create($request->validated());

        if ($request->topic_id) {
            $material->topic()->create([
                'topic_id' => $request->topic_id
            ]);
        }

        return new MaterialResource($material);
    }

    public function show(Classroom $classroom, Material $material)
    {
        return new MaterialResource(
            $classroom->materials()->where('id', $material->id)->first()
        );
    }

    public function update(MaterialRequest $request, Classroom $classroom, $id)
    {
        $material =  $classroom->materials()->find($id);
        
        $material->update();
        $material->classworkDetail->update($request->validated());

        if ($request->topic_id) {
            $material->topic->update([
                'topic_id' => $request->topic_id
            ]);
        }

        return new MaterialResource($material);
    }

    public function destroy(Classroom $classroom, $id)
    {
        $classroom->materials()->find($id)->delete();
        
        return response([], Response::HTTP_NO_CONTENT);
    }
}
