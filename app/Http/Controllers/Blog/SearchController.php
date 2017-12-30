<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;

class SearchController extends Controller
{
    protected $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function index(Request $request)
    {

        $search_results = $this->postsRepository->search($request);

        $data['search_results'] = $search_results;
        $data['search_str'] =$request->search_str;


        return view('search',$data);

    }


}
