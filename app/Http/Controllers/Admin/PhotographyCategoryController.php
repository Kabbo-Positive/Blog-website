<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotographyCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PhotographyCategoryController extends Controller
{
    public function index()
    {
        $pcategories = DB::table('photography_categories')->orderBy('id', 'desc')->paginate(15);
        return view('admin.photographycategory.photographycategory', compact('pcategories'));
    }

    public function add()
    {
        return view('admin.photographycategory.add');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'pcategory_name' => 'required',
        ]);

        $pcategories = new PhotographyCategory();
        $pcategories->pcategory_name = $request->input('pcategory_name');
        $pcategories->save();

        return redirect()->route('add_photography_category')->with('status', "PhotographyCategory Added Successfully");
    }

    public function edit($id)
    {
        $pcategories = PhotographyCategory::find($id);
        return view('admin.photographycategory.edit', compact('pcategories'));
    }

    public function update(Request $request, $id)
    {
        $pcategories = PhotographyCategory::find($id);
        $pcategories->pcategory_name = $request->input('pcategory_name');
        $pcategories->update();
        return redirect()->route('all_photography_category')->with('status', "PhotographyCategory Updated Successfully");
    }

    public function delete($id)
    {
        $pcategories = PhotographyCategory::find($id);
        $pcategories->delete();
        return redirect()->route('all_photography_category')->with('status', "PhotographyCategory Deleted Successfully");
    }
}
