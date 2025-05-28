<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ToolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'summary' => $this->summary,
            'description' => $this->description,
            'link' => $this->link,
            'icon' => $this->icon_url,
            'category' => $this->category->name ?? null,
            'tags' => $this->tags->map(fn($tag) => $tag->name)
        ];
    }
}
