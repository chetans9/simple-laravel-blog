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

    /**
     * Show list of comments
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$comments = $this->commentsRepository->all();
    	$data['comments'] = $comments;

    	return view('admin.comments.list',$data);
    }

    /**
     * Edit/Approve Comment
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
    	$comment = $this->commentsRepository->find($id);
    	//dd($comment);
    	$data['comment'] = $comment;

    	return view('admin.comments.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $inputs = $request->all();
        $comment = $this->commentsRepository->update($inputs,$id);
        
        $request->session()->flash('success','Comment updated successfully');

        return redirect(route('admin.comments'));
    }

    public function destroy(Request $request,$id)
    {
        $inputs = $request->all();
        $comment = $this->commentsRepository->delete($id);
        
        $request->session()->flash('info','Comment deleted successfully');

        return redirect(route('admin.comments'));
    }
}
