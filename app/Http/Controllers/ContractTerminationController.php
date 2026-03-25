<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractTermination;
use Illuminate\Http\Request;

class ContractTerminationController extends Controller
{
    public function store(Request $request, $contractId)
    {
        $contract = Contract::findOrFail($contractId);

        if ($contract->status === 'Finalizado' || $contract->status === 'Terminado') {
            return response()->json([
                'message' => 'Este contrato ya ha finalizado'
            ], 400);
        }

        $data = $request->validate([
            'termination_date' => 'required|date',
            'reason' => 'required|string|max:255'
        ]);

        $termination = ContractTermination::create([
            'contract_id' => $contract->id,
            'termination_date' => $data['termination_date'],
            'reason' => $data['reason']
        ]);

        $contract->update([
            'status' => 'Terminado'
        ]);

        return response()->json($termination, 201);
    }
}