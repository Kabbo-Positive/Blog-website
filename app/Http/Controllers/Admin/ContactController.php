<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contact;
use App\Mail\contactUsMail;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = DB::table('contacts')->paginate(5);
        //dd($contacts);
        return view('admin.contact.contact', compact('contacts'));
    }

    public function search(Request $request)
    {
        $search = $_GET['search'];

        $contacts = Contact::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->paginate(5);
        //dd($contacts);
        return view('admin.contact.contact', compact('contacts','search'));
    }

    public function view($id)
    {        
        $decryptedId = Crypt::decryptString($id);
        $contacts = Contact::find($decryptedId);
        if($contacts->status=="completed"){
            return view('admin.contact.reply_message', compact('contacts'));
        }
        else{
           // update contact status
           // to read
            $contacts->status = 'read';
            $contacts->update();
            return view('admin.contact.reply', compact('contacts'));
        }
    }

    public function status(Request $request)
    {
        $search_text = $_GET['status'];

        $contacts = Contact::where('status','LIKE',"%$search_text%")->paginate(5);
        //dd($contacts);
        return view('admin.contact.status', compact('contacts','search_text'));
    }


    public function reply(Request $request)
    {

        $request->validate([
            'id'  => 'required' ,
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'service' => 'required',
            'message' => 'required',
            'reply_message' => 'required',
        ]);

        $contact_from_data = request()->all();
        Mail::to($request->input('email'))->send(new contactUsMail($contact_from_data));

        $contacts = Contact::find($request->input('id'));
         // Save reply message to database
         $contacts->reply_message = $request->input('reply_message');
         // update contact status
         //  to completed
        $contacts->status = 'completed';
        $contacts->update();
        return redirect()->route('contact')->with('status', "Email Send Successfully");
    }

    public function download(Request $request,$file)
    {
        return response()->download(public_path('assets/contact/'.$file));
    }

    public function delete($id)
    {
        $contacts = Contact::find($id);
        $contacts->delete();
        return redirect()->route('contact')->with('status', "Contact Deleted Successfully");
    }
}
