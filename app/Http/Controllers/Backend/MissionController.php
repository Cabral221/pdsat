<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Domains\Imputation\Models\Imputation;
use App\Http\Controllers\Backend\MissionController;
use App\Domains\Imputation\Mail\FinalImputationMail;
use App\Domains\Imputation\Services\ImputationService;

class MissionController extends Controller
{
    public function index()
    {
        return view('backend.missions.index');
    }

}
