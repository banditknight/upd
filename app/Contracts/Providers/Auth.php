<?php

namespace App\Contracts\Providers;

use App\Exceptions\Custom\Account\AccountNotFoundException;
use App\Exceptions\Custom\Account\InActiveAccountException;
use App\Exceptions\Custom\Account\InvalidPasswordException;
use App\Models\v1\User;
use Illuminate\Support\Facades\Hash;

class Auth implements \Tymon\JWTAuth\Contracts\Providers\Auth
{
    private $user;

    /**
     * @param array $credentials
     * @return mixed
     * @throws InvalidPasswordException
     * @throws InActiveAccountException
     * @throws AccountNotFoundException
     */
    public function byCredentials(array $credentials)
    {
        $user = User::where('email', '=', $credentials['email'])->first();

        if (!$user) {
            throw new AccountNotFoundException();
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            // for security reason, do not throw message wrong password.
            throw new InvalidPasswordException();
        }

        // @todo check if user active or not
        if (!$user->isActive) {
            throw new InActiveAccountException();
        }

        return $this->user = $user;
    }

    public function byId($id)
    {

    }

    public function user()
    {
        return $this->user;
    }
}
