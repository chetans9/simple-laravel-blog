<?php

namespace App\Http\Controllers\Admin\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;

class AdminContactController extends Controller
{
    /**
     * @var ContactRepository
     */
    protected $contactRepository;

    /**
     * AdminContactController constructor.
     * @param ContactRepository $contactRepository
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {

        $data['list'] = $this->contactRepository->paginate(10);

        return view('admin.contact.list',$data);
    }

    public function show($id)
    {

        $data['contact'] = $this->contactRepository->find($id);

        return view('admin.contact.show',$data);
    }
}
