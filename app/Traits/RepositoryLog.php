<?php

namespace App\Traits;

trait RepositoryLog {
    public function log($action, $oldValue, $newValue){
        $user = auth()->user();
        $token = auth()->getToken();
        $ipAddress = request()->ip();
        $rid = 0;
        $uid = null;
        $vid = null;
        if(!empty($user->id) && !empty($user->vendorId)){
            $uid = $user->id;
            $vid = $user->vendorId;
        }

        $table = null;

        $naction = 0;
        if($action == 'create'){
            $naction = 2;
            $table = $newValue->getTable();
            $rid = $newValue->id;
            $oldValue = null;
        }else if($action == 'update'){
            $naction = 3;
            $table = $newValue->getTable();
            $rid = $newValue->id;
        }else if($action =='delete') {
            $naction = 4;
            $table = $oldValue->getTable();
            $rid = $oldValue->id;
        }

        \App\Models\v1\Log::create([
            'userId' => $uid,
            'vendorId' => $vid,
            'method' => $action,
            'content' => empty($oldValue) ? $newValue : $oldValue,
            'oldValue' => $oldValue,
            'table' => $table,
            'recordID' => $rid,
            'token' => sha1($token),
            'newValue' => $newValue,
            'ipAddress' => $ipAddress,
            'action' => $naction
        ]);

    }
}