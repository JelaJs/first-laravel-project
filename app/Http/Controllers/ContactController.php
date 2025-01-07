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
}
