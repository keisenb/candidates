<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function GetPositions()
    {
        return response()->json(Position::where('approved', true)->get());
    }

    public function GetPosition($id)
    {
        return response()->json(Position::where('approved', true)->findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $position = new Position;
        $position->name = $request->name;
        $position->description = $request->description;
        $position->approved = false;
        $position->save();

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

    public function approve($id)
    {
        $position = Position::where('approved', false)->findOrFail($id);
        $position->approved = true;
        $position->save();
        return response()->json($position, 200);
    }
}