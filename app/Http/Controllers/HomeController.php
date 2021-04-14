<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //config menu navigator
        $menuname="Home";
        $sidemenu=['menu-home'=>'active'];
        $m=explode(",",$menuname);
        $headmenu="Home";
        $navigator="
        <li class='breadcrumb-item '><a href='#'><i class='fas fa-home'></i> ".$m[0]."</a></li>";
        //end config menu navigator
        return view('home',compact('navigator','menuname','sidemenu','headmenu'));
    }
    
    
}
