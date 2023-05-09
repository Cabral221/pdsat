<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domains\Imputation\Services\ImputationService;

class ImputationController extends Controller
{

    public function index()
    {
        return view('frontend.pages.imputation');
    }

    public function store(Request $request, ImputationService $imputationService)
    {
        // Valider les donnees
        $request->validate([
            'sick_name' => 'required|string',
            'agent' => 'required|string',
            'registration_number' => 'required|string',
            'service' => 'required|string',
        ]);

        // Enregistrer dans la base de données
        $imputation = $imputationService->create([
            'sick_name' => $request->sick_name,
            'agent' =>  $request->agent,
            'registration_number' =>  $request->registration_number,
            'service' =>  $request->service,
        ]);

        // Alert success message
        return redirect()
                ->route('frontend.imputation.index')
                ->with(['success' => 'Votre Demande a bien été transmise au serviec Ressources Humaines du MDCSNEST']);
    }
}
