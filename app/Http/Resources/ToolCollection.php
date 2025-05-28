<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ToolCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($tool) {
                return [
                    'name' => $tool->name,
                    'summary' => $tool->summary,
                    'description' => $tool->description,
                    'link' => $tool->link,
                    'icon' => $tool->icon_url,
                    'category' => $tool->category->name ?? null,
                    'tags' => $tool->tags->map(fn($tag) => $tag->name)
                ];
            }),
        ];
    }
}
