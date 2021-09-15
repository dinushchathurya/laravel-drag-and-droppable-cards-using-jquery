<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $pendingItem = Item::where('status', 0)->orderBy('order')->get();
        $completeItem = Item::where('status', 1)->orderBy('order')->get();

        return view('welcome', compact('pendingItem', 'completeIte'));
    }
}
