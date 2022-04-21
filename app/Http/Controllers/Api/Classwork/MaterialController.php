<?php

namespace App\Http\Controllers\Api\Classwork;

use App\Events\ClassworkUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Http\Resources\MaterialResource;
use App\Models\Classroom;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// FIXME [adhere to single responsibility principle]
class MaterialController extends Controller
{
    public function index(Classroom $classroom)
    {
        return MaterialResource::collection(
            $classroom->materials
        );
    }

    public function store(MaterialRequest $request, Classroom $classroom)
    {
        $material =  $classroom->materials()->create();

        $material->classworkDetail()->create($request->validated());

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

        ClassworkUpdated::dispatch($material);

        return new MaterialResource($material);
    }

    public function destroy(Classroom $classroom, $id)
    {
        $classroom->materials()->find($id)->delete();
        
        return response([], Response::HTTP_NO_CONTENT);
    }
}
