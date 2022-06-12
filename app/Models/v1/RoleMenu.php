<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;

class RoleMenu extends AbstractModel
{
    protected $table = 'roleMenus';

    protected $fillable = [
        'roleId',
        'menuId',
    ];

    // protected $appends = [
    //     'menu',
    //     'role',
    // ];

    // public function getMenuAttribute(){
    //     return $this->hasOne(Menu::class,'id','menuId')->first();
    // }

    // public function getRoleAttribute(){
    //     return SpatieRole::find($this->roleId);
    // }

}
