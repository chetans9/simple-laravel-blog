<?php

namespace App\Http\Controllers\Back\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;
use App\Repositories\UserRepository;
use Auth;
class AdminPostsController extends Controller
{

    protected $posts;

    protected $users;

    public function __construct(PostsRepository $posts,UserRepository $users)
    {
        $this->middleware('auth');
        $this->posts = $posts;
        $this->users = $users;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list = $this->posts->paginate(50);

        return view('back.posts.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        return view("back.posts.create",$data);
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'active' => 'required',
        ]);
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = str_slug($inputs['title'], '-');
        $status = $this->posts->create($inputs);
        ($status)? $request->session()->flash('success', 'Post Successfull!'): $request->session()->flash('failure', 'Failed!');

        return redirect("admin/posts");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();

        $data['post'] = $this->posts->find($id);

        return view("back.posts.edit",$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'active' => 'required',
        ]);
        
        $inputs = $request->all();
              
        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = str_slug($inputs['title'], '-');
        $this->posts->update($inputs,$id);
        \Session::flash('success','Post Updated Successfully');
        return redirect(url('admin/posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
