<?php

namespace App\Http\Controllers\Admin\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Repositories\PostsRepository;
use App\Repositories\UserRepository;
use App\Repositories\PostCategoriesRepository;
use App\Repositories\TagsRepository;
use Auth;
class AdminPostsController extends Controller
{

    protected $postsRepository;

    protected $userRepository;

    protected $posts_categories;

    protected $tagsRepository;

    public function __construct(PostsRepository $posts,UserRepository $users, PostCategoriesRepository $posts_categories,TagsRepository $tagsRepository)
    {
        $this->middleware('auth');
        $this->postsRepository = $posts;
        $this->userRepository = $users;
        $this->posts_categories = $posts_categories;
        $this->tagsRepository = $tagsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->postsRepository->paginate(50);
        return view('admin.posts.list',compact('list'));
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

        $data['post_tags'] = array();
        $data['categories'] = $categories;
        return view("admin.posts.create",$data);
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
            'category_id'=>'required',
            'content' => 'required',
            'active' => 'required',
            'featured_image'=>'required'
        ]); 
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = str_slug($inputs['title'], '-');


        if($inputs['featured_image'])
        {
            $image_path = uploadWithThumb($inputs['featured_image'],'images/blog');
            $inputs['featured_image'] = $image_path;   
        }


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
        $post = $this->postsRepository->findOrFail($id);
        $categories = $this->posts_categories->getForSelect("name","id");
        //Tags should be populated in edit form

        $post_tags = $post->tags()->select("tags.id",'name')->get()->toArray();
        $tags =array();
        foreach ($post_tags as $tag)
        {
            $tags[$tag['id']] = $tag['name'];
        }
        $data['post_tags'] = $tags;
        $data['post'] = $post;
        $data['categories'] = $categories;

        return view("admin.posts.edit",$data);

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
        if($request->hasFile('featured_image'))
        {
            $image_path = uploadWithThumb($inputs['featured_image'],'images/blog');
            $inputs['featured_image'] = $image_path;   
        }
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
        $this->postsRepository->delete($id);
        \Session::flash('info','Post deleted Successfully');
        return redirect(url('admin/posts'));
    }
}
