<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{

    public function index()
    {
        return response()->json(
            Collaborator::all()
        );
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'document_type' => 'required|in:CC,CE,PPT',
            'document_number' => 'required|unique:collaborators',
            'birth_date' => 'required|date',
        ]);

        $collaborator = Collaborator::create($data);

        return response()->json($collaborator,201);
    }

    public function update(Request $request, $id)
    {

        $collaborator = Collaborator::findOrFail($id);

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        $collaborator->update($data);

        return response()->json($collaborator);
    }

    public function destroy($id)
    {

        $collaborator = Collaborator::findOrFail($id);

        $collaborator->delete();

        return response()->json([
            'message'=>'deleted'
        ]);
    }
}
