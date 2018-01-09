<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class AdminHeaderComposer
{
    public function compose(View $view)
    {



        $segments = request()->segments();
        $breadcrumbs = array();


        $breadcrumb_url = "admin";
        foreach ($segments as $segment) {

            if(is_numeric($segment) || $segment =="admin" || $segment=="dashboard"){
                continue;
            }

            if($segment !== end($segments))
            {
                $breadcrumb_url .="/".$segment;
            }
            else {
                $breadcrumb_url .="/".$segment."#";
            }




            $breadcrumb['name'] = ucfirst($segment);
            $breadcrumb['url'] = url($breadcrumb_url);
            $breadcrumbs[] = $breadcrumb;

        }


        $view->with(compact('breadcrumbs'));
    }

}