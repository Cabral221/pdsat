<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Domains\Mission\Models\Region;
use App\Domains\Mission\Mail\RequestMission;
use App\Domains\Mission\Services\MissionService;

class MissionController extends Controller
{
    public function index()
    {
        $regions = Region::orderBy('libele', 'ASC')->get();
        return view('frontend.pages.mission', compact('regions'));
    }

    public function store(Request $request, MissionService $missionService)
    {
        // Validation du formulaire
        $this->validate($request, [
            'genre' => 'required|boolean',
            'name' => 'required|string',
            'fonction' =>  'required|string',
            'matricule' => 'required|string|min:8|max:8',
            'matrimonial' => 'required|boolean',
            'depart_id' => 'required|integer',
            'arrive_id' => 'required|integer',
            'mission_id' => 'required|integer',
            'date_depart' => 'required|date',
            'date_arrive' => 'required|date',
            'vehicule' => 'required|string',
            'carburant' => 'required|boolean',
            'nombre_personne' => 'required|integer|max:4'
        ]);

        // Enregistrer dans la base de données
        $mission =  $missionService->create($request->all());
        // $imputation = $imputationService->create($request->all());

        // Notifier l'admin par mail
        Mail::to(User::first()->email)->send(new RequestMission($mission->name, $mission->genre));
        // Notifier l'user par mail
        // ...

        // Alert success message and return redirect to index of mission
        return redirect()
                ->route('frontend.index')
                ->with(['flash_success' => 'Votre Demande d\'ordre de mission a bien été transmise au service responsable']);
        dd($request->all());
    }
}
