<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function getAbout()
    {
    	return view('pages.about');
    }

    public function getIndex()
    {
    	return view('welcome');
    }
}
