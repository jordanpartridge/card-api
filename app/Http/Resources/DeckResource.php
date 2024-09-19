<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeckResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->resource->slug,
            'card_count' => $this->resource->cards()->count(),
            'joker_count' => $this->resource->jokers,
        ];
    }
}
