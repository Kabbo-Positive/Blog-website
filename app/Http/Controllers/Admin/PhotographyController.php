<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photography;
use App\Models\PhotographyCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PhotographyController extends Controller
{
    public function index()
    {
        $photography = Photography::select(['id', 'image', 'title','status' ,'pcategory_id' , 'created_at'])
        ->with('pcategory:id,pcategory_name')->orderBy('id', 'desc')->paginate(15);
        return view('admin.photography.photography', compact('photography'));
    }

    public function add()
    {
        $pcategories = PhotographyCategory::all();
        return view('admin.photography.add',compact('pcategories'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ]);


        $photography = new Photography();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/photography', $filename);
            $photography->image = $filename;
        }
        $photography->title = $request->input('title');
        $photography->sub_title = $request->input('sub_title');
        $photography->meta_title = $request->input('meta_title');
        $photography->meta_description = $request->input('meta_description');
        $photography->save();

        return redirect()->route('add_photography')->with('status', "Photography Added Successfully");
    }

    public function edit($id)
    {
        $pcategoris = PhotographyCategory::all();
        $photography = Photography::find($id);
        return view('admin.photography.edit', compact('photography'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ]);
        $photography = Photography::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/photography/' . $photography->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/photography/', $filename);
            $photography->image = $filename;
        }
        $photography->title = $request->input('title');
        $photography->sub_title = $request->input('sub_title');
        $photography->meta_title = $request->input('meta_title');
        $photography->meta_description = $request->input('meta_description');
        $photography->update();
        return redirect()->route('all_photography')->with('status', "Photography Updated Successfully");
    }

    public function delete($id)
    {
        $photography = Photography::find($id);
        if ($photography->image) {
            $path = 'assets/photography/' . $photography->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $photography->delete();
        return redirect()->route('all_photography')->with('status', "Photography Deleted Successfully");
    }
}
