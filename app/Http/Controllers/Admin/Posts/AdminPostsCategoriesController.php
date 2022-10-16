<?php

namespace App\Http\Controllers\Admin\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CategoriesModel;

class AdminPostsCategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list = CategoriesModel::paginate(50);


        return view('admin.post_categories.list', compact('list'));
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
            // 'active' => 'required',
        ]);
        $inputs = $request->all();

        $status = CategoriesModel::create($inputs);
        $request->session()->flash('success', 'New Category created Successfully!');
        return redirect("admin/posts-categories");

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

        $post_category = CategoriesModel::findOrFail($id);
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
        ]);
        $inputs = $request->all();
        $postCategory = CategoriesModel::findOrFail($id);
        $postCategory->fill($inputs);
        $postCategory->save();
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
        $postCategory = CategoriesModel::findOrFail($id);
        $postCategory->delete($id);
        $request->session()->flash('info','Category deleted Successfully');
        return redirect(route('posts-categories.index'));

    }
}
