<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\ContractExtension;

class ContractExtensionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'extension_type' => 'required|in:Tiempo,Valor',
            'new_end_date' => 'nullable|date',
            'additional_value' => 'nullable|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        $contract = Contract::findOrFail($data['contract_id']);

        if (in_array($contract->status, ['Terminado','Finalizado'])) {
            return back()->withErrors('No se puede extender un contrato finalizado');
        }

        $extension = ContractExtension::create($data);

        if ($data['extension_type'] === 'Tiempo' && $data['new_end_date']) {
            $contract->update([
                'end_date' => $data['new_end_date']
            ]);
        }

        return response()->json($extension, 201);
    }
}
