<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

trait Asset
{
    public function move(UploadedFile $uploadedFile)
    {
        $auth = auth();
        $defaultPath = storage_path('app/default');

        if ($user = $auth->user()) {
            $defaultPath = sprintf('%s/%s/%s', storage_path(), 'app/file', $user->id);
        }

        $currentTimeStamp = Carbon::now()->timestamp;

        $fileName = sprintf('%d.%s', $currentTimeStamp, $uploadedFile->getClientOriginalExtension());

        return $uploadedFile->move($defaultPath, $fileName)->getRealPath();
    }
}
