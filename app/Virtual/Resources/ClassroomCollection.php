<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="ClassroomCollection",
 *     description="Classroom Collection",
 *     @OA\Xml(
 *         name="ClassroomCollection"
 *     )
 * )
 */
class ClassroomCollection
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Resources\ClassroomResource[]
     */
    private $data;
}