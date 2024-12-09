<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrationResource;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationController extends Controller
{
    public function index() : JsonResource
    {
        return RegistrationResource::collection(Registration::all());
    }
}
