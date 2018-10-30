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
            return response()->json(District::where('approved', true)->with('state')->get());
        }
        return response()->json(District::where('approved', true)->get());
    }

    public function GetDistrict($id, Request $request)
    {
        $states = $request->get('states');
        if($states == true) {
            return response()->json(District::where('approved', true)->with('state')->findOrFail($id));
        }
        return response()->json(District::where('approved', true)->findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'district' => 'required|integer',
            'state_id' => 'exists:states,id'
        ]);

        $district = new District;

        $district->district = $request->district;
        $district->approved = false;
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

    public function approve($id)
    {
        $district = District::where('approved', false)->findOrFail($id);
        $district->approved = true;
        $district->save();
        return response()->json($district, 200);
    }
}