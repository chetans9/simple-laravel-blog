<?php

namespace App\Http\Controllers\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GalleryRepository;

class GalleryController extends Controller
{
    /**
     * @var GalleryRepository
     */
    protected $galleryRepository;

    /**
     * GalleryController constructor.
     *
     * @param GalleryRepository $galleryRepository
     */
    public function __construct(GalleryRepository $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    /**
     * Show the Gallery page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //retrieve collection of "gallery" which are active
        $galleries = $this->galleryRepository->getActive();

        $data['galleries'] = $galleries;
    	return view('gallery.index',$data);
    }
}
