<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->get();
        return view('admin.blog.blog', compact('blogs'));
    }

    public function add()
    {
        $category = BlogCategory::all();
        return view('admin.blog.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'blog_image' => 'required',
            'blog_title' => 'required',
            'category_id' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'author_name' => 'required',
            'body' => 'required|min:10',
        ]);

        $blogs = new Blog();
        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/blog', $filename);
            $blogs->blog_image = $filename;
        }
        if ($request->hasFile('author_image')) {
            $file = $request->file('author_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/author', $filename);
            $blogs->author_image = $filename;
        }
        $blogs->blog_title = $request->input('blog_title');
        $blogs->category_id = $request->input('category_id');
        $blogs->author_name = $request->input('author_name');
        $blogs->meta_title = $request->input('meta_title');
        $blogs->meta_description = $request->input('meta_description');
        $blogs->body = $request->input('body');
        $blogs->save();
        
        return redirect()->route('add_blog')->with('status', "Blog Added Successfully");
    }

    public function edit($id)
    {
        $category = BlogCategory::all();
        $blogs = Blog::find($id);
        return view('admin.blog.edit', compact('blogs','category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'blog_image' => 'required',
            'blog_title' => 'required',
            'category_id' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'author_name' => 'required',
            'body' => 'required|min:10',
        ]);
        $blogs = Blog::find($id);
        if ($request->hasFile('blog_image')) {
            $path = 'assets/blog/'.$blogs->blog_image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('blog_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/blog/', $filename);
            $blogs->blog_image = $filename;
        }
        if ($request->hasFile('author_image')) {
            $path = 'assets/author/'.$blogs->author_image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('author_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/author/', $filename);
            $blogs->author_image = $filename;
        }
        $blogs->blog_title = $request->input('blog_title');
        $blogs->category_id = $request->input('category_id');
        $blogs->author_name = $request->input('author_name');
        $blogs->meta_title = $request->input('meta_title');
        $blogs->meta_description = $request->input('meta_description');
        $blogs->body = $request->input('body');
        $blogs->update();
        return redirect()->route('all_blog')->with('status', "Blogs Updated Successfully");
    }

    public function delete($id)
    {
        $blogs = Blog::find($id);
        if ($blogs->blog_image) {
            $path = 'assets/blog/' . $blogs->blog_image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        if ($blogs->author_image) {
            $path = 'assets/author/' . $blogs->author_image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $blogs->delete();
        return redirect()->route('all_blog')->with('status', "Blog Deleted Successfully");
    }
 
    // Add Featured Blog
    public function featuredBlog(Request $request)
    {
        // need to get which one is featured
       $featured_blogs = Blog::where('featured', true)->get();
       Blog::where('id', $featured_blogs[0]->id)->update(['featured'=>false]);
       
        // not in featured. featured update 
       Blog::where('id', $request->input('id'))->update(['featured'=>true]);
       return redirect()->route('all_blog')->with('status', "Featured Blog Updated Successfully");
    }

    // Get Featured Blog Id
    public function getFeaturedBlog()
    {
        $get_featured_blog = Blog::where('status','1')->get();
        dd($get_featured_blog);
    }
}
