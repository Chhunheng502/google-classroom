<?php

namespace App\Virtual\Controllers;

class ClassroomController
{
    /** 
     * @OA\Get(
     *     path="/classrooms",
     *     tags={"Classrooms"},
     *     @OA\Response(
     *          response="200",
     *          description="Get a list of classrooms.",
     *          @OA\JsonContent(ref="#/components/schemas/ClassroomCollection")
     *     )
     * )
    */
    public function index() {}
 
    /**
     * @OA\Post(
     *     path="/classrooms",
     *     tags={"Classrooms"},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ClassroomRequest")
     *     ),
     *     @OA\Response(
     *          response="201",
     *          description="Create a classroom.",
     *          @OA\JsonContent(ref="#/components/schemas/ClassroomResource")
     *     )
     * )
     */
    public function store($request) {}

    /**
     * @OA\Get(
     *     path="/classrooms/{id}",
     *     tags={"Classrooms"},
     *     @OA\Response(
     *          response="200",
     *          description="Display a classroom.",
     *          @OA\JsonContent(ref="#/components/schemas/Classroom")
     *     )
     * )
     */
    public function show($id) {}

    /** 
     * @OA\Put(
     *     path="/classrooms/{id}",
     *     tags={"Classrooms"},
     *     @OA\Response(
     *          response="200",
     *          description="Update a classroom.",
     *          @OA\JsonContent(ref="#/components/schemas/ClassroomResource")
     *     )
     * )
    */
    public function update($request, $id) {}

    /** 
     * @OA\Delete(
     *     path="/classrooms/{id}",
     *     tags={"Classrooms"},
     *     @OA\Response(response="204", description="Delete a classroom.")
     * )
    */
    public function destroy($id) {}
}