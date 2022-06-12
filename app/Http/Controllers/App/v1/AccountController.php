<?php

namespace App\Http\Controllers\App\v1;

use App\Events\v1\AccountForgotPassword;
use App\Exceptions\Custom\Account\ForgotPasswordEmailNotFoundException;
use App\Exceptions\Custom\Account\ResetPasswordTokenExpiredException;
use App\Exceptions\Custom\Account\ResetPasswordTokenInvalidException;
use App\Exceptions\Custom\Repository\RepositoryException;
use App\Http\Requests\v1\Account\AccountForgotPasswordRequest;
use App\Http\Requests\v1\Account\AccountLoginRequest;
use App\Http\Requests\v1\Account\AccountRegisterRequest;
use App\Http\Requests\v1\Account\AccountResetPasswordRequest;
use App\Models\v1\ResetPasswordToken;
use App\Models\v1\User;
use App\Repositories\ResourceRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use League\Fractal\Manager;
use Tymon\JWTAuth\JWTAuth;

class AccountController extends AbstractController
{
    /** @var ResourceRepository */
    protected $repo;

    /**
     * @throws RepositoryException
     */
    public function __construct(Manager $fractal, Request $request, JWTAuth $JWTAuth)
    {
        parent::__construct($fractal, $request, $JWTAuth);

        $this->repo = new ResourceRepository(new User());
    }

    /**
     * @param AccountLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AccountLoginRequest $request) : \Illuminate\Http\JsonResponse
    {
        $token = $this->JWTAuth->attempt($request->only('email', 'password'));

        /** @var User $user */
        $user = $this->JWTAuth->user();
        $user->accessToken = $token;
        $user->expiredIn = $this->JWTAuth->factory()->getTTL();

        return $this->responseSuccess($user);
    }

    public function register(AccountRegisterRequest $request)
    {
        $createUser = $this->repo->create($request->all());

        return $this->responseSuccess($createUser);
    }

    /**
     * @throws ForgotPasswordEmailNotFoundException
     * @throws RepositoryException
     */
    public function forgotPassword(AccountForgotPasswordRequest $accountForgotPasswordRequest)
    {
        $findUserByEmail = $this->repo
            ->findByField('email', $accountForgotPasswordRequest->get('email'))->first();

        if (!$findUserByEmail) throw new ForgotPasswordEmailNotFoundException();

        event(new AccountForgotPassword($findUserByEmail));

        return $this->responseSuccess([]);
    }

    /**
     * @throws ResetPasswordTokenInvalidException
     * @throws ResetPasswordTokenExpiredException
     */
    public function resetPasswordVerify($token)
    {
        $findByToken = ResetPasswordToken::where('token', '=', $token)->first();

        if (!$findByToken) {
            throw new ResetPasswordTokenInvalidException();
        }

        if ($findByToken->expired <= Carbon::now()->timestamp) {
            throw new ResetPasswordTokenExpiredException();
        }

        if (!$findByToken->isActive) {
            throw new ResetPasswordTokenExpiredException();
        }

        return $this->responseSuccess([]);
    }

    /**
     * @throws ResetPasswordTokenInvalidException
     * @throws ResetPasswordTokenExpiredException
     * @throws RepositoryException
     */
    public function resetPassword(AccountResetPasswordRequest $accountResetPasswordRequest)
    {
        $token = $accountResetPasswordRequest->get('token');
        $findByToken = ResetPasswordToken::where('token', '=', $token)->first();

        if (!$findByToken) {
            throw new ResetPasswordTokenInvalidException();
        }

        if ($findByToken->expired <= Carbon::now()->timestamp) {
            throw new ResetPasswordTokenExpiredException();
        }

        if (!$findByToken->isActive) {
            throw new ResetPasswordTokenExpiredException();
        }

        $findUserById = $this->repo
            ->findByField('id', $findByToken->userId)->first();

        $findByToken->isActive = false;
        $findByToken->save();

        $findUserById->password = $accountResetPasswordRequest->get('password');
        $findUserById->save();

        return $this->responseSuccess([]);
    }
}
