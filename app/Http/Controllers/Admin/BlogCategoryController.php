<?php

namespace App\Http\Controllers\Admin;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::with('blog')->get();
        return view('admin.blogcategory.blogcategory', compact('categories'));
    }

    public function add()
    {
        return view('admin.blogcategory.add');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $categories = new BlogCategory();
        $categories->category_name = $request->input('category_name');
        $categories->save();

        return redirect()->route('add_category')->with('status', "BlogCategory Added Successfully");
    }

    public function edit($id)
    {
        $categories = BlogCategory::find($id);
        return view('admin.blogcategory.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $categories = BlogCategory::find($id);
        $categories->category_name = $request->input('category_name');
        $categories->update();
        return redirect()->route('all_category')->with('status', "BlogCategory Updated Successfully");
    }

    public function delete($id)
    {
        $categories = BlogCategory::find($id);
        $categories->delete();
        return redirect()->route('all_category')->with('status', "BlogCategory Deleted Successfully");
    }
}
