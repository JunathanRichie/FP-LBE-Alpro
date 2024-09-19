<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class All_ItemsController extends Controller
{
    public function index()
    {
        return view('all-items');
    }
}
