<?php

namespace App\Http\Controllers;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;



class peopleController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(People::all());
        
    }

    public function show($id): JsonResponse
    {
        $person = People::find($id);
        return response()->json($person);
        
    }

    public function create(Request $request)
{
    $request->validate([
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'age' => 'required|integer',
        'mobile' => 'required|integer',
        'city' => 'required|string',
        'country' => 'required|string',
    ]);

    $newRecord = People::create([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'age' => $request->input('age'),
        'mobile' => $request->input('mobile'),
        'city' => $request->input('city'),
        'country' => $request->input('country'),
    ]);

    return response()->json($newRecord);
}

public function edit(Request $request, $id)
{
  
    $request->validate([
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'age' => 'required|integer',
        'mobile' => 'required|integer',
        'city' => 'required|string',
        'country' => 'required|string',
    ]);

    
    $people = People::find($id);

    $people->update([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'age' => $request->input('age'),
        'mobile' => $request->input('mobile'),
        'city' => $request->input('city'),
        'country' => $request->input('country'),
    ]);

  
    return response()->json($people);
} 

    public function delete($id): JsonResponse
    {
        $person = People::find($id);
        $person->delete();

        return response()->json(null);
        
    }
}