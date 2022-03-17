<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Classroom request",
 *      description="Classroom request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class ClassroomRequest
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new classroom",
     *      example="CS426 Section 3"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the new project",
     *      example="This is new project's description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="Section",
     *      description="Section of the new classroom",
     *      example="Section 3"
     * )
     *
     * @var string
     */
    public $section;

    /**
     * @OA\Property(
     *      title="Room",
     *      description="Room of the new classroom",
     *      example="Room 204"
     * )
     *
     * @var string
     */
    public $room;
    
    /**
     * @OA\Property(
     *      title="Subject",
     *      description="Subject of the new classroom",
     *      example="Cloud Computing"
     * )
     *
     * @var string
     */
    public $subject;
}