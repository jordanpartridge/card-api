<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property $resource
 */
class CardResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'rank' => $this->resource->rank,
            'suit' => SuitResource::make($this->resource->suit),
        ];
    }
}
