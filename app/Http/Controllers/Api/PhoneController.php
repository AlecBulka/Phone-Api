<?php

namespace App\Http\Controllers\Api;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PhoneResource;
use App\Http\Resources\PhoneCollection;
use App\Http\Requests\StorePhoneRequest;
use App\Http\Requests\UpdatePhoneRequest;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 'Success',
            'data' => new PhoneCollection(Phone::all())
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhoneRequest $request)
    {
        $validated = $request->validated();

        $imageName = $request->image->getClientOriginalName();

        $request->image->move(public_path('img/phones'), $imageName);

        $validated['image'] = 'https://phone-api.alecbulka.com/img/phones/' . $imageName;

        $phone = Phone::create($validated);

        return response()->json([
            'status' => 'Success',
            'message' => 'Phone Created',
            'data' => new PhoneResource($phone)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Phone $phone)
    {
        return response()->json([
            'status' => 'Success',
            'data' => new PhoneResource($phone)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhoneRequest $request, Phone $phone)
    {
        $validated = $request->validated();

        $phone->update($validated);

        return response()->json([
            'status' => 'Success',
            'message' => 'Phone Updated',
            'data' => new PhoneResource($phone)
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone)
    {
        $phone->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Phone Deleted'
        ], 200);
    }
}
