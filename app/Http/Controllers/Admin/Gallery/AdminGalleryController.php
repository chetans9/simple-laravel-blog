<?php

namespace App\Http\Controllers\Admin\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GalleryModel;

class AdminGalleryController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = GalleryModel::paginate(20);
        $data['galleries'] = $galleries;
        return view('admin.gallery.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.gallery.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image_title' => 'required|max:200',
            'image_desc' => 'required|max:25',
            'image' => 'required|mimes:jpeg,bmp,png,jpg|max:8000',
        ]);
        $inputs = $request->all();


        if($request->file('image'))
        {

            $image_path = uploadWithThumb($inputs['image'],'images/gallery');

            $inputs['image'] = $image_path;

        }
        GalleryModel::create($inputs);
        return redirect(route('gallery.index'));

        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = GalleryModel::find($id);
        $data['gallery'] = $gallery;
        return view('admin.gallery.edit',$data);
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

        $this->validate($request,[
            'image_title' => 'required|max:200',
            'image_desc' => 'required|max:25',
            'image' => 'mimes:jpeg,bmp,png,jpg|max:8000',
        ]);
        $inputs = $request->all();



        if($request->file('image'))
        {
            $image_path = uploadWithThumb($inputs['image'],'images/gallery');
            $inputs['image'] = $image_path;
        }

        $gallery = GalleryModel::find($id);
        $gallery->fill();
        $gallery->save();


        $request->session()->flash('success','gallery updated successfully');

        return redirect(route('gallery.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GalleryModel::delete($id);
        \Session::flash("info","Gallery Image deleted successfully");
        return redirect()->back();
    }
}
