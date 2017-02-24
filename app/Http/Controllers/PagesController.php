<?php

namespace shortener\Http\Controllers;

use Illuminate\Http\Request;

use shortener\Http\Requests;


class PagesController extends Controller
{
    public function getAbout()
    {
    	return view('pages.about');
    }

    public function getIndex()
    {
    	return view('index');
    }
}
