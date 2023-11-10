<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Domains\Imputation\Models\Imputation;
use App\Domains\Imputation\Mail\FinalImputationMail;
use App\Domains\Imputation\Services\ImputationService;

class ImputationController extends Controller
{
    public function index(ImputationService $imputationService)
    {
        $imputations = $imputationService->all();

        return view('backend.imputations.index', compact('imputations'));
    }

    public function show(Imputation $imputation)
    {
        return view('backend.imputations.show', compact('imputation'));
    }

    public function load(Request $request, Imputation $imputation)
    {
        // Validation
        $this->validate($request, [
            'file' => 'file',
            'file' => 'required|file|mimes:pdf',
        ]);

        // save file Directory
        $hashName = $request->file('file')->hashName();
        $request->file('file')->store('public/imputations');

        // save file Database
        $imputation->update(['file' => 'storage/imputations/'.$hashName]);

        // Envoyer Par mail
        Mail::to($imputation->email)->send(new FinalImputationMail($imputation, $hashName));
        $imputation->update(['status' => true]);

        // redirect  to imputation show with success message
        return redirect()
                    ->route('admin.imputations.show', $imputation)
                    ->with(['flash_success' => 'Le document a bien été chargé et transmis au demandeur']);
    }

    public function activeRequest(Imputation $imputation)
    {
        $imputation->update(['validation' => ! $imputation->validation]);
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

    public function print(Imputation $imputation, ImputationService $imputationService)
    {
        $nomFichier = "Imputation-Budgetaire-" . $imputation->registration_number . ".pdf";
        $pdf = $imputationService->getPrint($imputation);

        return $pdf->stream();
    }

    public function download(Imputation $imputation)
    {
        return response()->download($imputation->file);
    }

    public function resend(Imputation $imputation)
    {
        // Envoyer Par mail
        Mail::to($imputation->email)->send(new FinalImputationMail($imputation));

        return redirect()
                    ->route('admin.imputations.show', $imputation)
                    ->with(['flash_success' => 'Le document a bien été transmis par mail au demandeur']);
    }
}
