<?php

namespace App\Http\Controllers\Admin\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactModel;

class AdminContactController extends Controller
{
    /**
     * @var ContactRepository
     */
    protected $contactRepository;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data['list'] = ContactModel::paginate(10);

        return view('admin.contact.list',$data);
    }

    public function show($id)
    {
        $contact = ContactModel::findOrFail($id);

        if($contact->seen == '0'){
            $contact->seen = '1';
            $contact->save();
        }

        $data['contact'] = $contact;
        return view('admin.contact.show',$data);
    }
}
