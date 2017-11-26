<?php

namespace App\Http\Controllers\Back\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;
use App\Repositories\UserRepository;
use App\Repositories\PostCategoriesRepository;
use Auth;
class AdminPostsController extends Controller
{

    protected $postsRepository;

    protected $userRepository;

    protected $posts_categories;

    public function __construct(PostsRepository $posts,UserRepository $users, PostCategoriesRepository $posts_categories)
    {
        $this->middleware('auth');
        $this->postsRepository = $posts;
        $this->userRepository = $users;
        $this->posts_categories = $posts_categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->postsRepository->paginate(50);
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
        $categories = $this->posts_categories->getForSelect("name","id");
        $data['categories'] = $categories;
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
            'category'=>'required',
            'content' => 'required',
            'active' => 'required',
            'featured_image'=>'required'
        ]);
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = str_slug($inputs['title'], '-');
        $status = $this->postsRepository->create($inputs);
        ($status)? $request->session()->flash('success', 'Post Successfull!'): $request->session()->flash('failure', 'Failed!');

        return redirect("admin/posts");

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

        $data['post'] = $this->postsRepository->find($id);
        $categories = $this->posts_categories->getForSelect("name","id");
        $data['categories'] = $categories;

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
        $this->postsRepository->update($inputs,$id);
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
