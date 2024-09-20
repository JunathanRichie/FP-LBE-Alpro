<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class All_ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $items = $items->map(function ($item) use ($userId) {
            $item->userId = $userId; // Tambahkan atribut userId
            return $item;
        });
    
        return view('all-items', compact('items'));
    }
}
