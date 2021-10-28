<?php

namespace App\Http\Controllers\ErrorController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function index_404()
    {
        return view('errors.404');
    }
}
