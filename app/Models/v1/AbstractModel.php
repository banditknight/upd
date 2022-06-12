<?php

namespace App\Models\v1;

use App\Casts\Attachment;
use App\Contracts\Transformable;
use App\Traits\FormRequestAttributes;
use App\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection as BaseCollection;
use Illuminate\Support\Str;

abstract class AbstractModel extends Model implements Transformable
{
    use TransformableTrait, FormRequestAttributes;

    public CONST DEFAULT_TIMESTAMP_FORMAT_MYSQL = 'Y-m-d H:i:s';

    public CONST DEFAULT_TIMESTAMP_FORMAT_SQL_SERVER = 'Y-m-d H:i:s.u';

    protected $hidden = [
        // 'created_at',
        // 'updated_at'
    ];

    public function getAttributes()
    {
        $attributeAttachment = preg_grep('/([aA]ttachment|logo)/', array_keys($this->attributes));

        if ($attributeAttachment && !request()->routeIs('app.asset.store')) {
            $foundAttribute = array_values($attributeAttachment);

            $casts = [];
            foreach ($foundAttribute as $attribute) {
                $casts += [
                    $attribute => Attachment::class,
                ];
            }

            $this->mergeCasts($casts);
        }

        return parent::getAttributes();
    }
}
