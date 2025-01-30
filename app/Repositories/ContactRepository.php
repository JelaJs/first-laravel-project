<?php


namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository {

    private $contactModel;
    public function __construct() {
        
        $this->contactModel = new ContactModel();
    }

    public function createMessage($request) {

        $this->contactModel->create([
            "email" => $request->email,
            "subject" => $request->subject,
            "message"=> $request->message
        ]);
    }

    public function getSingleContact($contact) {

        return $this->contactModel->where(["id"=> $contact])->first();
    }

    public function updateMessage($request, $contact) {
        $contact->update([
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message
        ]);
    }
}