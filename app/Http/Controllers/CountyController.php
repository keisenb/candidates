<?php

namespace App\Http\Controllers;

use App\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{

    public function GetCounties(Request $request)
    {
        $states = $request->get('states');
        if($states == true) {
            return response()->json(County::with('state')->get());
        }
        return response()->json(County::all());
    }

    public function GetCounty($id, Request $request)
    {
        $states = $request->get('states');
        if($states == true) {
            return response()->json(County::with('state')->findOrFail($id));
        }
        return response()->json(County::findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'state_id' => 'exists:states,id'
        ]);

        $county = new County;

        $county->name = $request->name;
        $county->state()->associate($request->state_id);
        $county->save();

        return response()->json($county, 201);
    }

    public function update($id, Request $request)
    {
        $county = County::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'state' => 'exists:states'
        ]);
        
        $county->name = $request->name;
        $county->state()->associate($request->state_id);
        $county->save();

        return response()->json($county, 200);
    }

    public function delete($id)
    {
        County::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Record deleted.',
        ], 204);
    }
}