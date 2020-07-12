<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $page = "home";
        return view('index',compact('page'));
    }

    public function terms(){
        return view('terms');
    }
    public function privacy(){
        return view('privacy');
    }
    public function about(){
        return view('about');
    }
}
