<?php

namespace App\Http\Controllers\Admin\Tags;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TagsRepository;

class AdminTagsController extends Controller
{
    /**
     * @var TagsRepository
     */
    protected $tagsRepository;

    /**
     * AdminTagsController constructor.
     * @param TagsRepository $tagsRepository
     */
    public function __construct(TagsRepository $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tags'] = $this->tagsRepository->all();
        return view('admin.tags.list',$data);
    }
    public function showTagsSuggestions(Request $request)
    {
        $inputs = $request->all();
        $return['results'] = $this->tagsRepository->getTagsSuggestion($inputs);

        return response()->json($return);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->tagsRepository->create($inputs);
        return redirect(route('tags.index'))->with('success','New tag created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['tag'] = $this->tagsRepository->find($id);
        return view('admin.tags.edit',$data);

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
        $inputs = $request->all();
        $this->tagsRepository->update($inputs,$id);
        return redirect(route('tags.index'))->with('success','Tag updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tagsRepository->delete($id);
    }
}
