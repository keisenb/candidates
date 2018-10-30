<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function GetPositions()
    {
        return response()->json(Position::all());
    }

    public function GetPosition($id)
    {
        return response()->json(Position::findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $position = Position::create($request->all());

        return response()->json($position, 201);
    }

    public function update($id, Request $request)
    {
        $position = Position::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $position->update($request->all());

        return response()->json($position, 200);
    }

    public function delete($id)
    {
        Position::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Record deleted.',
        ], 204);
    }
}