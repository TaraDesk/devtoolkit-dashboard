<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    /** @use HasFactory<\Database\Factories\ToolFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'summary', 
        'description', 'link',
        'icon_url', 'category_id'
    ];

    public function tag(string $name)
    {
        $tag = Tag::firstOrCreate(['name' => strtolower($name)]);

        $this->tags()->attach($tag->id);
    }

    public function updateTag(array $tagNames)
    {
        $tagIds = collect($tagNames)->map(function ($name) {
            return Tag::firstOrCreate(['name' => strtolower($name)])->id;
        });
        
        $this->tags()->sync($tagIds);        
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
