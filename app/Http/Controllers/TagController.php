<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('tools.category')->orderBy('name', 'asc')->get();
        $alphabet_tags = Tag::orderBy('name', 'asc')->get()->groupBy(function ($tag) {
            return strtoupper(substr($tag->name, 0, 1));
        });
        
        return view('admin.tags.index', ['tags' => $tags, 'alphabet' => $alphabet_tags]);
    }

    public function show(Tag $tag)
    {
        $tag->with('tools.category');

        return view('admin.tags.show', ['tag' => $tag]);
    }
}
