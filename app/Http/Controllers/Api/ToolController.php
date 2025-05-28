<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\ToolCollection;
use App\Http\Resources\ToolResource;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index(Request $request) {

        if ($request->has('search')) {
            $tools = Tool::whereRaw('LOWER(name) LIKE ?', ["%". strtolower($request['search']) ."%"])
                ->with(['category', 'tags'])
                ->get();

            if(! count($tools)) {
                return response()->json([
                    'status' => 404,
                    'error' => 'Tool not found.'
                ], 404);
            }

            return new ToolCollection($tools);
        } else if ($request->has('tag')) {
            $tag = Tag::whereRaw('LOWER(name) = ?', [strtolower($request['tag'])])
                ->with(['tools.category', 'tools.tags'])
                ->first();

            if(empty($tag)) {
                return response()->json([
                    'status' => 404,
                    'error' => 'Tag not found.'
                ], 404);
            }

            return new TagResource($tag);
        } else if ($request->has('category')) {
            $category = Category::whereRaw('LOWER(name) = ?', [strtolower($request['category'])])
                ->with(['tools.category', 'tools.tags'])
                ->first();

            if(empty($category)) {
                return response()->json([
                    'status' => 404,
                    'error' => 'Category not found.'
                ], 404);
            }

            return new CategoryResource($category);
        } else {
            return new ToolCollection(Tool::with(['category', 'tags'])->get());
        }
    }

    public function show(string $name) {
        $tool = Tool::whereRaw('LOWER(name) = ?', [strtolower($name)])->first();
        
        if(empty($tool)) {
            return response()->json([
                'status' => 404,
                'error' => 'Tool not found.'
            ], 404);
        } else {
            return new ToolResource($tool);
        }
    }
}
