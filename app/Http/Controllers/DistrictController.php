<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{

    public function GetDistricts(Request $request)
    {
        $states = $request->get('states');
        if($states == true) {
            return response()->json(District::with('state')->get());
        }
        return response()->json(District::all());
    }

    public function GetDistrict($id, Request $request)
    {
        $states = $request->get('states');
        if($states == true) {
            return response()->json(District::with('state')->get());
        }
        return response()->json(District::findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'district' => 'required|integer',
            'state_id' => 'exists:states,id'
        ]);

        $district = new District;

        $district->district = $request->district;
        $district->state()->associate($request->state_id);
        $district->save();

        return response()->json($district, 201);
    }

    public function update($id, Request $request)
    {
        $district = District::findOrFail($id);

        $this->validate($request, [
            'district' => 'required|integer',
            'state' => 'exists:states'
        ]);
        
        $district->district = $request->district;
        $district->state()->associate($request->state_id);
        $district->save();

        return response()->json($district, 200);
    }

    public function delete($id)
    {
        District::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Record deleted.',
        ], 204);
    }
}