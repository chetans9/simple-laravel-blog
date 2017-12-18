<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CommentsRepository;
use App\Repositories\ContactRepository;


class AdminDashboardController extends Controller
{
    /**
     * @var CommentsRepository
     */
    protected $commentsRepository;

    /**
     * @var ContactRepository
     */
    protected $contactRepository;

    /**
     * AdminDashboardController constructor.
     * @param CommentsRepository $commentsRepository
     * @param ContactRepository $contactRepository
     */
    public function __construct(CommentsRepository $commentsRepository, ContactRepository $contactRepository)
    {
        $this->commentsRepository = $commentsRepository;
        $this->contactRepository = $contactRepository;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = array();
        $num_unread_comments = $this->commentsRepository->countUnreadComments();
        $num_unread_contact = $this->contactRepository->countUnreadContact();


        $data['num_unread_contact'] = $num_unread_contact;
        $data['num_unread_comments'] = $num_unread_comments;
    	return view("admin.dashboard",$data);
    }
}
