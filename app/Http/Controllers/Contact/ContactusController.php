<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;

class ContactusController extends Controller
{

    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        return view('contact.contact');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email',
            'message' => 'required|max:255',
        ]);
        $inputs = $request->all();

        $this->contactRepository->create($inputs);

        return redirect()->back()->with('success', 'Your request has been sent successfully');

    }

}
