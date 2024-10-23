<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // only return the data you need
        return [
            'id' => $this->id,
            'name' => $this->name,

            /* if you have a relationship that you want to load, you can eager load it to avoid n+1 query problems, like this: */
            // 'relationship' => new RelationshipResource($this->whenLoaded('relationship')),
        ];
    }
}
