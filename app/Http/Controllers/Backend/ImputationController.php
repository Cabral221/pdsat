<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Domains\Imputation\Models\Imputation;
use App\Domains\Imputation\Services\ImputationService;

class ImputationController extends Controller
{
    public function index(ImputationService $imputationService)
    {
        // get all request in waiting
        $imputations = $imputationService->all();

        return view('backend.imputations.index', compact('imputations'));
    }

    public function activeRequest(Imputation $imputation)
    {
        $imputation->update(['validation' => ! $imputation->validation]);
        // dd('activer une demande', $imputation);
        session()->flash('flash_success', 'La demande d\'imputation budgétaire a été validé et est en approbation de signature.');

        return redirect()->back();
    }

    public function delete($imputation_id, ImputationService $imputationService)
    {
        $imputation = $imputationService->find($imputation_id);

        $imputationService->delete($imputation);

        session()->flash('flash_success', 'La demande d\'imputation budgétaire a bien été suprimé.');
        return redirect()->route('admin.imputations.index');
    }

    public function print()
    {
        
    }
}
