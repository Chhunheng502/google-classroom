<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\RegistrationCollection;
use App\Http\Resources\RegistrationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        return new RegistrationCollection(Auth::user()->registrations);
    }

    public function store(RegistrationRequest $request)
    {
        $registration = Auth::user()->registrations()->create($request->validated());

        return new RegistrationResource($registration);
    }
}
