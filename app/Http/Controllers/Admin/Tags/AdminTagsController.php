<?php

namespace App\Http\Controllers\Admin\Tags;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TagsRepository;
use App\Models\TagsModel;
use Yajra\Datatables\Datatables;

class AdminTagsController extends Controller
{
    /**
     * @var TagsRepository
     */
    protected $tagsRepository;

    /**
     * AdminTagsController constructor.
     *
     * @param TagsRepository $tagsRepository
     */
    public function __construct(TagsRepository $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    /**
     * Display the list of tags.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $model = $this->tagsRepository->query();
            return Datatables::of($model)
                ->addColumn('actions', function ($tags) use ($request) {
                    return '<a href="'.$request->url().'/'.$tags->id .'/edit'.' " class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>'.
                        '<a href="'.$request->url().'/'.$tags->id .'/edit'.' " class="btn btn-danger delete-data"><span class="glyphicon glyphicon-trash"></span></a>';
                })->rawColumns(['actions'])
                ->make(true);
        }

        $data['tags'] = $this->tagsRepository->all();
        return view('admin.tags.list',$data);
    }

    /**
     * Show Tags suggestions for select2 jquery plugin.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
