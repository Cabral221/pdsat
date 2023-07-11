<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Domains\Imputation\Mail\RequestImputation;
use App\Domains\Imputation\Services\ImputationService;

class ImputationController extends Controller
{

    public function index()
    {
        return view('frontend.pages.imputation');
    }

    public function store(Request $request, ImputationService $imputationService)
    {
        $request->agent = $request->first_name . ' ' . $request->last_name;

        // Valider les donnees
        $request->validate([
            'sick_name' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'registration_number' => 'required|string',
            'service' => 'required|string',
        ]);

        // Enregistrer dans la base de données
        $imputation = $imputationService->create($request->all());

        // Notifier l'admin par mail
        $email = User::first()->email;
        Mail::to($email)->send(new RequestImputation());

        // Alert success message and return redirect to index of imputation
        return redirect()
                ->route('frontend.imputation.index')
                ->with(['flash_success' => 'Votre Demande a bien été transmise au service Ressources Humaines du MDCSNEST']);
    }
}
