<?php

namespace Wuwx\LaravelAttribute;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    protected $table = "attribute_content_types";

    protected $fillable = [
        'name',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
