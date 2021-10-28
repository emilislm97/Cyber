<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    //Haqqında seife gorunusu
    public function about(){
        $about = About::first();
        return view('about.about',compact('about',));
    }
}
