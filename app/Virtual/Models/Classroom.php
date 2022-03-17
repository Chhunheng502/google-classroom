<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Classroom",
 *     description="Classroom model",
 *     @OA\Xml(
 *         name="Classroom"
 *     )
 * )
 */
class Classroom
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
     *      title="Description",
     *      description="Description of the new classroom",
     *      example="This Course is recommended for third-year students."
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
    
    /**
     * @OA\Property(
     *      title="Code",
     *      description="Code of the new classroom",
     *      example="7ab2BW1"
     * )
     *
     * @var string
     */
    public $code;

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

    /**
     * @OA\Property(
     *     title="Admin",
     *     description="Classroom admin's user model"
     * )
     *
     * @var \App\Virtual\Models\User
     */
    private $admin;
}
