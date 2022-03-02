<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Contact;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        $blogcount = DB::table('blogs')->count();
        $portfolio = Portfolio::all();
        $portfoliocount = DB::table('portfolios')->count();
        $contact = Contact::all();
        $contactcount = DB::table('contacts')->count();
        $contactunreadcount = DB::table('contacts')->where('status','unread')->count();
        $contacts = Contact::where('status', 'unread')->orderBy('id', 'desc')->paginate(15);
        return view('admin.dashboard.index',compact('blogcount','portfoliocount','contactcount','contacts','contactunreadcount'));
    }
}
