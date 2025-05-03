<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
//  categories  category
class categoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('id', 'desc')->paginate(5);
        return view('categories.index', compact('categories'));
    }
    public function edit($id)
    {
        $category = category::query()->findOrFail($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        //  dd($request);
        $category = category::query()->findOrFail($request->id);

        $category->update([
            'name' => $request->name,
        ]);
        $category->save();
        return redirect()->route('DataProject.category.index')->with('success', 'category updated successfully!');
    }


    public function delete($id)
    {
        $category = category::findOrFail($id);
        $category->delete();

        return redirect()->route('DataProject.category.index')->with('success', 'category deleted successfully!');
    }




    public function create()
    {
        return view('Categories.create');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        category::create([
            'name' => $request->name,

        ]);

        return redirect()->route('DataProject.category.index')->with('success', 'Category created successfully!');
    }
}
