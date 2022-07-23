<?php

namespace App\Http\Controllers\Admin\Comments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentsModel;
use Yajra\Datatables\Datatables;

class AdminCommentsController extends Controller
{

    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Show List of Comments
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {

        if($request->ajax())
        {
            $model = CommentsModel::query();
            return Datatables::of($model)
                ->addColumn('actions', function ($model) use ($request) {
                    $id = $model->id;
                    $link = $request->url().'/'.$id;
                    //Edit Button
                    $actionHtml = '<a href="'.$link.'/edit'.' " class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a>';
                    //Delete Button
                    $actionHtml .='<a href="" data-delete-url="'.$link .'" class="btn btn-danger btn-sm delete-data" data-toggle="modal" data-target="#deleteModal"><span class="glyphicon glyphicon-trash"></span></a>';
                    return $actionHtml;
                })
                ->addColumn('post',function ($model) use ($request){
                    //Show Post title on which user has Commented
                    $actionHtml = $model->post->title;
                    return $actionHtml;
                })

                ->rawColumns(['actions','status'])
                ->make(true);
        }

    	return view('admin.comments.list');
    }

    /**
     * Edit/Approve Comment
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
    	$comment = CommentsModel::findOrFail($id);
        $comment->read = '1';
        $comment->save();
    	$data['comment'] = $comment;
    	return view('admin.comments.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $inputs = $request->all();
        $comment = CommentsModel::findOrFail($id);
        $comment->fill($comment);
        $comment->save();

        $request->session()->flash('success','Comment updated successfully');

        return redirect(route('admin.comments'));
    }

    public function destroy(Request $request,$id)
    {
        $inputs = $request->all();
        $comment = CommentsModel::findOrFail($id);
        $comment->delete($id);
        
        $request->session()->flash('info','Comment deleted successfully');

        return redirect(route('admin.comments'));
    }
}
