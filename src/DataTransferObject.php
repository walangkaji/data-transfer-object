<?php

namespace Walangkaji\DataTransferObject;

use ReflectionClass;
use ReflectionProperty;
use Walangkaji\DataTransferObject\Attributes\CastWith;
use Walangkaji\DataTransferObject\Attributes\MapTo;
use Walangkaji\DataTransferObject\Casters\DataTransferObjectCaster;
use Walangkaji\DataTransferObject\Exceptions\UnknownProperties;
use Walangkaji\DataTransferObject\Reflection\DataTransferObjectClass;

#[CastWith(DataTransferObjectCaster::class)]
abstract class DataTransferObject
{
    public function __construct(...$args)
    {
        if (\is_array($args[0] ?? null)) {
            $args = $args[0];
        }

        $class = new DataTransferObjectClass($this);

        foreach ($class->getProperties() as $property) {
            $property->setValue(Arr::get($args, $property->name, $property->getDefaultValue()));

            $args = Arr::forget($args, $property->name);
        }

        if ($class->isStrict() && \count($args)) {
            throw UnknownProperties::new(static::class, array_keys($args));
        }

        $class->validate();
    }

    protected static function arrayOf(array $arrayOfParameters): array
    {
        return array_map(
            fn (mixed $parameters) => new static($parameters),
            $arrayOfParameters
        );
    }

    protected function all(): array
    {
        $data = [];

        $class = new ReflectionClass(static::class);

        $properties = $class->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            if ($property->isStatic()) {
                continue;
            }

            $mapToAttribute = $property->getAttributes(MapTo::class);
            $name           = \count($mapToAttribute) ? $mapToAttribute[0]->newInstance()->name : $property->getName();

            $data[$name] = $property->getValue($this);
        }

        return $data;
    }

    protected function clone(...$args): static
    {
        return new static(...array_merge($this->toArray(), $args));
    }

    public function toArray(): array
    {
        return $this->parseArray($this->all());
    }

    protected function parseArray(array $array): array
    {
        foreach ($array as $key => $value) {
            if ($value instanceof DataTransferObject) {
                $array[$key] = $value->toArray();

                continue;
            }

            if (! \is_array($value)) {
                continue;
            }

            $array[$key] = $this->parseArray($value);
        }

        return $array;
    }
}
