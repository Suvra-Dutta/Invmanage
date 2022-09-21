<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AllContact() {
        $allContacts     = Contact::latest()->paginate(3);
        return view('admin.contact.index',compact('allContacts'));
    }

    public function AddContact(Request $request)
    {
        return view('admin.contact.addcontact');
    }

    public function StoreContact(Request $request)
    {
        $data = array();
        $data["address"] = $request->contactAddress;
        $data["email"]   = $request->contactEmail;
        $data["phone"]   = $request->contactPhone;
        DB::table('contacts')->insert($data);

        return redirect()->route('home.contact')->with('success','Contact Added Successfully');
    }

    public function Edit($id) {
        $editContact = DB::table('contacts')->where('id',$id)->first();

        return view('admin.contact.edit',compact('editContact'));
    }

    public function Update(Request $request,$id) {
        $data = array();
        $data["address"] = $request->contactAddress;
        $data["email"]   = $request->contactEmail;
        $data["phone"]   = $request->contactPhone;
        DB::table('contacts')->where('id',$id)->update($data);

        return redirect()->route('home.contact')->with('success','Contact Updated Successfully');
    }

    public function Delete($id) {
        $deleteContact = Contact::find($id)->delete();

        return redirect()->back()->with('success','Contact Deleted Successfully');
    }

    // Contact Messages
    public function ContactMessages() {
        $allContactMessages  = ContactForm::latest()->paginate(3);
        return view('admin.contact.contactmessage',compact('allContactMessages'));
    }

    public function DeleteMessage($id) {
        $deleteMessage = ContactForm::find($id)->delete();

        return redirect()->back()->with('success','Contact Message Deleted Successfully');
    }
}
