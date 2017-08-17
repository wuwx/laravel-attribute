<?php

namespace Wuwx\LaravelAttribute\Traits;

use Wuwx\LaravelAttribute\ContentType;
use Wuwx\LaravelAttribute\Property;
use Wuwx\LaravelAttribute\Value;

trait Attributable
{
    private $entityProperties;
    private $entityAttributes;

    protected static function boot()
    {
        parent::boot();
        self::saved(function($entity) {
            foreach($entity->getEntityProperties() as $property) {
                $entity->values()->updateOrCreate(['property_id' => $property->id], ['data' => $entity->getEntityAttribute($property->name)]);
            }
        });
    }

    public function getFillable()
    {
        foreach($this->getEntityProperties() as $property) {
            if (!in_array($property->name, $this->fillable)) {
                array_push($this->fillable, $property->name);
            }
        }
        return parent::getFillable();
    }

    public function values()
    {
        return $this->morphMany(Value::class, 'entity');
    }

    public function getAttribute($key)
    {
        return $this->isEntityAttribute($key) ? $this->getEntityAttribute($key) : parent::getAttribute($key);
    }

    public function setAttribute($key, $value)
    {
        $this->isEntityAttribute($key) ? $this->setEntityAttribute($key, $value) : parent::setAttribute($key, $value);
    }

    public function getEntityAttribute(string $key)
    {
        return array_get($this->getEntityAttributes(), $key);
    }

    public function setEntityAttribute($key, $value)
    {
        $this->entityAttributes[$key] = $value;
    }

    public function isEntityAttribute(string $key)
    {

        return $this->getEntityProperties()->has($key);
    }

    public function getEntityAttributes()
    {
        if (!$this->entityAttributes) {
            $this->entityAttributes = $this->values->pluck('data', 'property.name');
        }
        return $this->entityAttributes;
    }

    public function getEntityProperties()
    {
        if (!$this->entityProperties) {
            if ($content_type = ContentType::where('name', self::class)->first()) {
                $this->entityProperties = $content_type->properties->keyBy('name');
            } else {
                $this->entityProperties = collect();
            }
        }
        return $this->entityProperties;
    }

}