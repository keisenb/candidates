<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{

    public function GetIssues()
    {
        return response()->json(Issue::where('approved', true)->get());
    }

    public function GetIssue($id)
    {
        return response()->json(Issue::where('approved', true)->findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $issue = new Issue;
        $issue->name = $request->name;
        $issue->description = $request->description;
        $issue->approved = false;
        $issue->save();

        return response()->json($issue, 201);
    }

    public function update($id, Request $request)
    {
        $issue = Issue::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $issue->name = $request->name;
        $issue->description = $request->description;
        $issue->approved = false;
        $issue->save();

        return response()->json($issue, 200);
    }

    public function delete($id)
    {
        Issue::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Record deleted.',
        ], 204);
    }

    public function approve($id)
    {
        $issue = Issue::where('approved', false)->findOrFail($id);
        $issue->approved = true;
        $issue->save();
        return response()->json($issue, 200);
    }
}