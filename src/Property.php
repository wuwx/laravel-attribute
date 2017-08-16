<?php

namespace Wuwx\LaravelAttribute;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = "attribute_properties";

    protected $fillable = [
        'name', 'label',
    ];

    public function content_type()
    {
        $this->belongsTo(ContentType::class);
    }
}
