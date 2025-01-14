<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view("contact");
    }

    public function getAllContacts() {

        $allContacts = ContactModel::all();
        return view("allContacts", compact("allContacts"));
    }

    public function sendMessage(Request $request) {
        $request->validate([
            "email" => "required|email",
            "subject" => "required|string|max:64",
            "message" => "required|string|min:5"
        ]);

        ContactModel::create([
            "email" => $request->email,
            "subject" => $request->subject,
            "message"=> $request->message
        ]);

        return redirect("/");
    }

    public function delete($contact) {
        $singleContact = ContactModel::where(["id"=> $contact])->first();

        if($singleContact === null) { 
            die("This contact doesn't exist");
        }

        $singleContact->delete();

        return redirect()->back();
    }

    public function editView($contact) {
        $singleContact = ContactModel::where(["id"=> $contact])->first();
        
        if($singleContact === null) {
            die("Contact with this Id doesn't exist");
        }

       return view("editContact", compact("singleContact"));
    }

    public function edit(Request $request) {
        $request->validate([
            "email" => "required|email",
            "subject" => "required|string|max:64",
            "message" => "required|string|min:5",
            "id" => "required|integer|min:1"
        ]);

        $contact = ContactModel::where(["id" => $request->id])->first();
        
        $contact->update([
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message
        ]);

        return redirect()->route("allContacts");
    }
}
