<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="ClassroomResource",
 *     description="Classroom resource",
 *     @OA\Xml(
 *         name="ClassroomResource"
 *     )
 * )
 */
class ClassroomResource
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

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
     *      title="Theme Path",
     *      description="Theme path of the new classroom",
     *      example="images/img_breakfast.jpg"
     * )
     *
     * @var string
     */
    public $theme_path;

    /**
     * @OA\Property(
     *      title="Meeting Link",
     *      description="Meeting link of the new classroom",
     *      example="https://meet.google.com/kjn-jtni-zqn"
     * )
     *
     * @var string
     */
    public $meeting_link;
}