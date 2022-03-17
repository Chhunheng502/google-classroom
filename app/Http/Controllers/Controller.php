<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Google Classroom API Documentation",
 *      description="For frontend developers.",
 *      @OA\Contact(
 *          email="Chhunheng@gmail.com"
 *      ),
 * )
 *
 * @OA\Tag(
 *     name="Classrooms",
 *     description="API Endpoints of Classrooms"
 * )
*/
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
