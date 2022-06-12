<?php

namespace App\Application\Transformers;

use App\Models\v1\AbstractModel;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(AbstractModel $user)
    {
        $data = [
            'id' => $user->id,
            'code' => $user->code,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'isPrimary' => (boolean)$user->isPrimary,
            'role' => $user->role,
            'roleId' => $user->roleId,
            'department' => $user->department,
            'attachment' => $user->attachment,
            'jobTitle' => $user->jobTitle,
        ];

        if($user->vendor){
            $data['vendor'] = $user->vendor->only(['id','registrationNumber','name']);
            $data['logo'] = $user->vendor->logo['url'] ?? null;
        }

        if ($user->accessToken) {
            $data['accessToken'] = $user->accessToken;
            $data['expiredIn'] = $user->expiredIn;
        }

        return $data;
    }
}
