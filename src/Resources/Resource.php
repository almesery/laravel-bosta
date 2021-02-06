<?php

namespace Almesery\Bosta\Resources;

use Almesery\Bosta\Bosta;

class Resource
{
    /**
     * The resource attributes.
     *
     * @var array
     */
    public array $attributes;

    /**
     * The Bosta SDK instance.
     *
     * @var Bosta|null
     */
    protected ?Bosta $bosta;

    /**
     * Create a new resource instance.
     *
     * @param array $attributes
     * @param Bosta|null $bosta
     */
    public function __construct(array $attributes, Bosta $bosta = null)
    {
        $this->attributes = $attributes;
        $this->bosta = $bosta;
        $this->fill();
    }

    /**
     * Fill the resource with the array of attributes.
     *
     * @return void
     */
    protected function fill()
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key);
            $this->{$key} = $value;
        }
    }

    /**
     * Convert the key name to camel case.
     *
     * @param string $key
     * @return string
     */
    protected function camelCase(string $key): string
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }

    /**
     * Transform the items of the collection to the given class.
     *
     * @param array $collection
     * @param string $class
     * @param array $extraData
     * @return array
     */
    protected function transformCollection(array $collection, string $class, $extraData = []): array
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData, $this->bosta);
        }, $collection);
    }
}
