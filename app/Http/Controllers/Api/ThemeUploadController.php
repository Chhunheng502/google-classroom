<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeUploadRequest;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ThemeUploadController extends Controller
{
    public function update(ThemeUploadRequest $request, Classroom $classroom)
    {
        $classroom->theme_path = $request->theme_path->store('images', 'public');

        $classroom->save();

        return response()->json(['data' => $classroom], 201);
    }
}
