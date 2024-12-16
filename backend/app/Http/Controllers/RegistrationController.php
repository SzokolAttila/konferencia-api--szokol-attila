<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Resources\RegistrationResource;
use App\Models\Registration;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class RegistrationController extends Controller
{
    public function index(Request $request) : JsonResource
    {
        $registrations = Registration::query();
        $orderBy = $request->query("orderBy");
        $order = $request->query("order");
        if ($orderBy == "name"){
            if ($order == "asc")
                $registrations->orderBy("name");
            else if($order == "desc")
                $registrations->orderByDesc("name");
        }
        else if ($orderBy == "date"){
            if ($order == "asc")
                $registrations->orderBy("date");
            else if ($order == "desc")
                $registrations->orderByDesc("date");
        }
        return RegistrationResource::collection($registrations->get());
    }

    public function show(int $registrations) : JsonResource
    {
        return new RegistrationResource(Registration::findOrFail($registrations));
    }

    public function destroy(int $registrations) : Response
    {
        if (Registration::findOrFail($registrations)->delete())
            return response()->noContent();
        abort(404);
    }

    public function count() : int
    {
        return Registration::count();
    }

    public function store(StoreRegistrationRequest $request) : JsonResource
    {
        return new RegistrationResource(Registration::create($request->validated()));
    }
}
