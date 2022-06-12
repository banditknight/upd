<?php

namespace App\Rules;

use App\Models\v1\Asset;
use App\Traits\User;
use Illuminate\Contracts\Validation\Rule;

class FileValid implements Rule
{
    use User;

    public function passes($attribute, $value)
    {
        $asset = Asset::find($value);

        if (!$asset) {
            return false;
        }

        $userId = $asset->userId;
        $loggedInUser = $this->getUser();

        if ($userId !== null && !$loggedInUser) {
            return false;
        }

        if ($userId !== null && $loggedInUser->id !== $userId) {
            return false;
        }

        $asset->userId = $loggedInUser->id ?? null;
        $asset->vendorId = $loggedInUser->vendorId ?? null;

        $asset->save();

        return true;
    }

    public function message()
    {
        return __('validation.file_not_valid');
    }
}
