<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class All_ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $userId = auth()->user()->id; 
        // return response()->json($items['image']);
        return view('all-items', compact('items', 'userId'));
    }
}
