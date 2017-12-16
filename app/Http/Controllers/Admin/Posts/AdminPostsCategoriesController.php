<?php

namespace App\Http\Controllers\Admin\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\PostCategoriesRepository;

class AdminPostsCategoriesController extends Controller
{

    protected $categories;

    protected $users;

    public function __construct(UserRepository $users, PostCategoriesRepository $categories)
    {
        $this->middleware('auth');
        $this->PostCategoriesRepository = $categories;
        $this->users = $users;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list = $this->PostCategoriesRepository->paginate(50);


        return view('admin.post_categories.list', compact('list'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'active' => 'required',
        ]);
        $inputs = $request->all();

        $status = $this->PostCategoriesRepository->create($inputs);
        ($status) ? $request->session()->flash('success', 'New Category created Successfully!') : $request->session()->flash('fail', 'Failed!');

        return redirect("admin/posts-categories");

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post_category = $this->PostCategoriesRepository->find($id);
        $data['post_category'] = $post_category;
        return view('admin.post_categories.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'active' => 'required',
        ]);
        $inputs = $request->all();
        $post_category = $this->PostCategoriesRepository->update($inputs, $id);

        $request->session()->flash('success', 'Category Updated Successfully!');
        return redirect(route('posts-categories.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->PostCategoriesRepository->delete($id);
        \Session::flash('info','Category deleted Successfully');
        return redirect(route('posts-categories.index'));

    }
}
