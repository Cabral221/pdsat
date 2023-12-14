<?php

namespace App\Domains\Auth\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // .......
        return view('backend.auth.account.index');
    }

    public function show($account)
    {
        dd($account);
        // .....

        return view('backend.auth.account.show');
    }
}
