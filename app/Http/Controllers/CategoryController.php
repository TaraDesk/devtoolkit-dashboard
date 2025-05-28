<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('tools')->orderBy('name', 'asc')->get();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'unique:categories,name']
        ]);

        Category::create($validation);

        return redirect('/admin/categories')->with('flash', [
            'type' => 'success',
            'icon' => 'check-circle',
            'title' => 'Category Added',
            'message' => 'The category has been added successfully.'
        ]);        
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    public function update(Category $category, Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')->ignore($category->id)]
        ]);

        $category->update($validation);

        return redirect('/admin/categories/' . $category->id )->with('flash', [
            'type' => 'success',
            'icon' => 'check-circle',
            'title' => 'Changes Saved',
            'message' => 'The category details have been updated successfully.'
        ]);                
    }
}
