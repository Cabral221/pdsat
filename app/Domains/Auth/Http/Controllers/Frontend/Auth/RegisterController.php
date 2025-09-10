<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Rules\Captcha;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Domains\Auth\Services\UserService;
use Illuminate\Foundation\Auth\RegistersUsers;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
use App\Domains\Auth\Notifications\Backend\ActivateAccount;

/**
 * Class RegisterController.
 */
class RegisterController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * RegisterController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Where to redirect users after registration.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        return view('frontend.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => array_merge(['max:100'], PasswordRules::register($data['email'] ?? null)),
            'terms' => ['required', 'in:1'],
            'g-recaptcha-response' => ['required_if:captcha_status,true', new Captcha],
        ], [
            'terms.required' => __('You must accept the Terms & Conditions.'),
            'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Domains\Auth\Models\User|mixed
     *
     * @throws \App\Domains\Auth\Exceptions\RegisterException
     */
    protected function create(array $data)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        return $this->userService->registerUser($data);
    }

    /**
     * Get page for activate account
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activationForm()
    {
        return view('frontend.user.account.activate');
    }

    public function activate(Request $request)
    {
        $request->validate([
            'registration_number' => 'required|string|unique:accounts',
            'email' => 'required|email|unique:accounts,email',
            'phone' => 'required|numeric|unique:accounts,phone',
            'cni' => 'required|file|mimes:pdf,jpg,png,jpeg',
        ]);

        // Enregistrer la demande dans la base de données
        $account = $this->userService->activate($request->all());

        // Send notification/mail à l'admin GRH
        User::first()->notify(new ActivateAccount($account->id));
        // $account->notify(new ActivateAccount($account->id));

        return redirect()->route('frontend.index')
                ->with(['flash_success' => "Votre demande d'activation de compte utilisateur a bien été transmis aux Services Ressources Humaines, Aprés validation vous recevrez vos identifiants de connexion par défaut !"]);
    }
}
