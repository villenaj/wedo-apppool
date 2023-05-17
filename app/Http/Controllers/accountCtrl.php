<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accountCtrl extends Controller
{
    public function index(Request $request)
    {
        return view('Members.summary');
    }
}
