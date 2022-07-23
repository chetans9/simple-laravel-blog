<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostsModel;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $query = new PostsModel();

        if ($request->search_str) {

            $query = $query->where('title', 'like', "%$request[search_str]%")
                ->orWhereHas('tags', function ($q) use ($request) {
                    $q->where('name', '=', "$request[search_str]");
            });
        }

        $search_results = $query->paginate(10);

        $data['search_results'] = $search_results;
        $data['search_str'] =$request->search_str;


        return view('search',$data);

    }


}
