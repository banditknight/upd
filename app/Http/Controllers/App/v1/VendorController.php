<?php

namespace App\Http\Controllers\App\v1;

use App\Exceptions\Custom\Repository\RepositoryException;
use App\Http\Requests\v1\Vendor\VendorRegisterRequest;
use App\Http\Requests\v1\Vendor\VendorVerificationRequest;
use App\Models\v1\Vendor;
use App\Repositories\ResourceRepository;
use App\Traits\User;
use App\Traits\VendorRegisterTransaction;
use App\Traits\VendorVerification;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use Tymon\JWTAuth\JWTAuth;

class VendorController extends AbstractController
{
    use VendorRegisterTransaction, VendorVerification, User;

    /**
     * @throws RepositoryException
     */
    public function __construct(Manager $fractal, Request $request, JWTAuth $JWTAuth)
    {
        parent::__construct($fractal, $request, $JWTAuth);

        $this->repo = new ResourceRepository(new Vendor());
    }

    public function register(VendorRegisterRequest $request)
    {
        $transaction = $this->transaction($request);

        return $this->responseSuccess($transaction);
    }

    public function profile()
    {
        $user = $this->getUser();

        return $this->responseSuccess($user->vendor ?? []);
    }

    public function index()
    {
        $user = $this->getUser();

        return $this->responseSuccess($user->vendor ?? []);
    }

    public function verification(VendorVerificationRequest $request)
    {
        $verify = $this->verify($this->getUser(), $request->get('comment'));

        return $this->responseSuccess($verify);
    }
}
