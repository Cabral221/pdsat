<?php

namespace App\Domains\Auth\Services;


use App\Domains\Auth\Models\Account;
use App\Services\BaseService;

/**
 * Class AccountService.
 */
class AccountService extends BaseService
{
    public $userService;


    /**
     * AccountService constructor.
     *
     * @param  Account  $account
     */
    public function __construct(Account $account, UserService $userService)
    {
        $this->model = $account;
        $this->userService = $userService;
    }

    /**
     * find user by registration number , phone and email
     *
     * @param array $array
     * @return void|User
     */
    public function findUser(Array $array = [])
    {
        return $this->userService->where('registration_number', $array['registration_number'])
                                ->where('phone', $array["phone"])
                                ->where('email', $array['email'])
                                ->first();
    }


}
