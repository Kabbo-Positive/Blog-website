<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $blogcount = DB::table('blogs')->count();
        //$portfoliocount = DB::table('portfolios')->count();
        $photographycount = DB::table('photographies')->count();
        $contactcount = DB::table('contacts')->count();
        $contacts = Contact::where('status', 'unread')->orderBy('id', 'desc')->paginate(10);
        $contactunreadcount = $contacts->count();
        return view('admin.dashboard.index',compact('blogcount','photographycount','contactcount','contactunreadcount','contacts'));
    }
}
