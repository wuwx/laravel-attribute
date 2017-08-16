<?php

namespace Wuwx\LaravelAttribute;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $table = "attribute_values";

    protected $fillable = [
        'property_id', 'data',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function entity()
    {
        return $this->morphTo();
    }
}
