<?php

namespace App\Domains\Auth\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Domains\Auth\Models\Account;
use App\Http\Controllers\Controller;
use App\Domains\Auth\Services\UserService;
use App\Domains\Auth\Services\AccountService;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{

    /**
     * Account Service
     *
     * @var AccountService
     * @var UserService
     */
    public $accountService;

    public $userService;

    /**
     * Account Controller construct
     *
     * @param AccountService $accountService
     */
    public function __construct(AccountService $accountService, UserService $userService)
    {
        $this->accountService = $accountService;
        $this->userService = $userService;
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $accounts = $this->accountService
                    ->orderBy('created_at', 'DESC')
                    ->paginate(10);

        return view('backend.auth.account.index', compact('accounts'));
    }

    public function show(Account $account)
    {
        dd($account);
        return view('backend.auth.account.', compact('account'));
    }


    public function activate(Account $account)
    {
        // RECUPERER TOUS LES INFORMATIONS CONCERNANT L AGENT
        $user = $this->accountService->findUser([
            'registration_number' => $account->registration_number,
            'phone' => $account->phone,
            'email' => $account->email,
        ]);

        // Si l'utilisateur est enregistrer
        if($user) {
            // allez mark function de userService pour l activer
            // ...
            dd($account, $user);
        }
        // RETURN SUR LA MM PAGE

        return view('backend.auth.account.show', compact('account'));
    }
}
