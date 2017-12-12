<?php

namespace App\Http\Controllers\Admin\Comments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CommentsRepository;

class AdminCommentsController extends Controller
{
	protected $commentsRepository;

    public function __construct(CommentsRepository $commentsRepository)
    {
    	$this->commentsRepository = $commentsRepository;
    	$this->middleware('auth');
    }

    public function index()
    {
    	$comments = $this->commentsRepository->all();
    	$data['comments'] = $comments;

    	return view('admin.comments.list',$data);
    }

    public function edit($id)
    {
    	$comment = $this->commentsRepository->find($id);
    	//dd($comment);
    	$data['comment'] = $comment;

    	return view('admin.comments.edit',$data);
    }
}
