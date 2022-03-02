<?php

namespace App\Http\Controllers\Admin;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.portfolio', compact('portfolios'));
    }

    public function add()
    {
        return view('admin.portfolio.add');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'url_link' => 'required',
        ]);


        $portfolios = new Portfolio();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/portfolio', $filename);
            $portfolios->image = $filename;
        }
        $portfolios->title = $request->input('title');
        $portfolios->sub_title = $request->input('sub_title');
        $portfolios->meta_title = $request->input('meta_title');
        $portfolios->meta_description = $request->input('meta_description');
        $portfolios->url_link = $request->input('url_link');
        $portfolios->save();

        return redirect()->route('add_portfolio')->with('status', "Portfolio Added Successfully");
    }

    public function edit($id)
    {
        $portfolios = Portfolio::find($id);
        return view('admin.portfolio.edit', compact('portfolios'));
    }

    public function update(Request $request, $id)
    {
        $portfolios = Portfolio::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/portfolio/' . $portfolios->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/portfolio/', $filename);
            $portfolios->image = $filename;
        }
        $portfolios->title = $request->input('title');
        $portfolios->sub_title = $request->input('sub_title');
        $portfolios->meta_title = $request->input('meta_title');
        $portfolios->meta_description = $request->input('meta_description');
        $portfolios->url_link = $request->input('url_link');
        $portfolios->update();
        return redirect()->route('all_portfolio')->with('status', "Portfolio Updated Successfully");
    }

    public function delete($id)
    {
        $portfolios = Portfolio::find($id);
        if ($portfolios->image) {
            $path = 'assets/portfolio/' . $portfolios->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $portfolios->delete();
        return redirect()->route('all_portfolio')->with('status', "Portfolio Deleted Successfully");
    }
}
