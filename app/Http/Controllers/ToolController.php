<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::with(['category', 'tags'])->orderBy('name', 'asc')->get();
        $alphabet_tools = Tool::orderBy('name', 'asc')->get()->groupBy(function ($tag) {
            return strtoupper(substr($tag->name, 0, 1));
        });

        $categories = Category::all();

        return view('admin.tools.index', ['tools' => $tools, 'alphabet' => $alphabet_tools, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required'],
            'summary' => ['required', 'min:15'],
            'description' => ['required', 'min:30'],
            'link' => ['required', 'active_url'],
            'category_id' => ['required', 'exists:categories,id'],
            'url' => ['required', 'url', 'active_url']
        ]);

        $tags = explode(',', $request['tags']);
        $tags = array_map('trim', $tags);

        $tool = Tool::create([
            'name' => $validation['name'],
            'summary' => $validation['summary'],
            'description' => $validation['description'],
            'link' => $validation['link'],
            'category_id' => $validation['category_id'],
            'icon_url' => $validation['url']
        ]);

        foreach ($tags as $tag) {
            $tool->tag($tag);
        }

        return redirect('/admin/tools')->with('flash', [
            'type' => 'success',
            'icon' => 'wrench',
            'title' => 'Tool Created',
            'message' => 'The tool has been created successfully.'
        ]);
    }

    public function show(Tool $tool)
    {   
        $categories = Category::all();

        return view('admin.tools.show', ['tool' => $tool, 'categories' => $categories]);
    }

    public function update(Tool $tool, Request $request)
    {
        $validation = $request->validate([
            'name' => ['required'],
            'summary' => ['required', 'min:15'],
            'description' => ['required', 'min:30'],
            'link' => ['required', 'active_url'],
            'category_id' => ['required', 'exists:categories,id'],
            'url' => ['required', 'url', 'active_url']
        ]);

        $tags = explode(',', $request['tags']);
        $tags = array_map('trim', $tags);

        $tool->update([
            'name' => $validation['name'],
            'summary' => $validation['summary'],
            'description' => $validation['description'],
            'link' => $validation['link'],
            'category_id' => $validation['category_id'],
            'icon_url' => $validation['url']
        ]);

        $tool->updateTag($tags);

        return redirect('/admin/tools')->with('flash', [
            'type' => 'success',
            'icon' => 'wrench',
            'title' => 'Changes Saved',
            'message' => 'The tool has been updated successfully.'
        ]);        
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();
        
        return redirect('/admin/tools')->with('flash', [
            'type' => 'success',
            'icon' => 'trash-2',
            'title' => 'Tool Deleted',
            'message' => 'The tool has been deleted successfully.'
        ]);        
    }
}
