<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // Ambil semua item dari database
        $items = Item::all();

        // Kembalikan data dalam format JSON
        return response()->json($items);
    }
}
