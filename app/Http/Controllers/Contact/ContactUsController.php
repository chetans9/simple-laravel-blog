<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactModel;

class ContactUsController extends Controller
{

    public function index()
    {
        return view('contact.contact');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200|min:3',
            'email' => 'required|email',
            'message' => 'required|max:255',
        ]);
        $inputs = $request->all();
        $return = array();
        $contact = ContactModel::create($inputs);
        
        $return['status'] = 1;
        $return['message'] = "Your request has been recorded";
        return response()->json($return);

    }

}
