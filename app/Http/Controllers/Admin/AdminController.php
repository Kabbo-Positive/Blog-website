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
        $portfoliocount = DB::table('portfolios')->count();
        $contactcount = DB::table('contacts')->count();
        $contactunreadcount = DB::table('contacts')->where('status','unread')->orderBy('id', 'desc')->count();
        $contacts = Contact::where('status', 'unread')->orderBy('id', 'desc')->paginate(15);
        return view('admin.dashboard.index',compact('blogcount','portfoliocount','contactcount','contactunreadcount','contacts'));
    }
}
