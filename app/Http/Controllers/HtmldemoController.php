<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HtmldemoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function page1()
    {
        return view('htmldemo/page1');
    }

    public function page2()
    {
        return view('htmldemo/page2');
    }

    public function page3()
    {
        return view('htmldemo/page3');
    }

    public function page4()
    {
        return view('htmldemo/page4');
    }

    public function page6()
    {
        return view('htmldemo/page6');
    }
}
