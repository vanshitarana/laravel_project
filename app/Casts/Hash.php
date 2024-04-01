<?php

namespace App\Casts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes;

class Hash implements CastsInboundAttributes
{
    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */


     public function __construct(
        protected string|null $algorithm = null,
    ) {}
    
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return is_null($this->algorithm)
        ? bcrypt($value)
        : hash($this->algorithm, $value);
    }
}
