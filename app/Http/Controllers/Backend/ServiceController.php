<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{


    public function index()
    {
        $services = Service::all();

        return view('backend.services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'service' => 'required|string|max:200|unique:services,libele',
            'cigle' => 'required|string|max:10|unique:services,cigle',
        ]);


        Service::create([
            'libele' => $request->service,
            'cigle' => Str::upper($request->cigle),
        ]);

        return redirect()
                ->route('admin.services.index')
                ->with(['flash_success' => "Le service $request->cigle à bien été créé"]);
    }
}
