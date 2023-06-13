<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Domains\Imputation\Services\ImputationService;

class ImputationController extends Controller
{
    public function index()
    {
        return view('backend.imputations.index');
    }

    public function delete($imputation_id, ImputationService $imputationService)
    {
        $imputation = $imputationService->find($imputation_id);

        $imputationService->delete($imputation);

        session()->flash('success', 'La demande d\'imputation budgétaire a bien été suprimé.');
        return redirect()->route('admin.imputations.index');
    }
}
