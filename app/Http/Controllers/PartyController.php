<?php

namespace App\Http\Controllers;

use App\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{

    public function GetParties()
    {
        return response()->json(Party::all());
    }

    public function GetParty($id)
    {
        return response()->json(Party::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $party = Party::create($request->all());

        return response()->json($party, 201);
    }

    public function update($id, Request $request)
    {
        $party = Party::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $party->update($request->all());

        return response()->json($party, 200);
    }

    public function delete($id)
    {
        Party::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}