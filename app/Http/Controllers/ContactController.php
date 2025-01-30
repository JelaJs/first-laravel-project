<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditMessageRequest;
use App\Http\Requests\SendMessageRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    private $contactRepo;

    public function __construct() {

        $this->contactRepo = new ContactRepository();
    }

    public function index() {
        return view("contact");
    }

    public function getAllContacts() {

        $allContacts = ContactModel::all();
        return view("allContacts", compact("allContacts"));
    }

    public function sendMessage(SendMessageRequest $request) {
        
        $this->contactRepo->createMessage($request);

        return redirect("/");
    }

    public function delete($contact) {
        
        $singleContact = $this->contactRepo->getSingleContact($contact);

        if($singleContact === null) { 
            die("This contact doesn't exist");
        }

        $singleContact->delete();

        return redirect()->back();
    }

    public function editView($contact) {
        $singleContact = $this->contactRepo->getSingleContact($contact);
        
        if($singleContact === null) {
            die("Contact with this Id doesn't exist");
        }

       return view("editContact", compact("singleContact"));
    }

    public function edit(EditMessageRequest $request) {
       
        $contact = $this->contactRepo->getSingleContact($request->id);
        
        $this->contactRepo->updateMessage($request, $contact);

        return redirect()->route("allContacts");
    }
}
