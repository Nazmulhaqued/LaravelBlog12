<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
    	$blog= view('pages.blog');
	
    		return view('home')
    		->with('blog',$blog); 
    }
    public function portfolio()
    {
    	$portfolio= view('pages.portfolio');

    return view('home')
    		->with('portfolio',$portfolio); 
    }
}
