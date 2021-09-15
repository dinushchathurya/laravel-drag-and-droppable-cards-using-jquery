<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
   public function index()
    {
    	$pendingItem = Item::where('status',0)->orderBy('order')->get();
    	$completeItem = Item::where('status',1)->orderBy('order')->get();

    	return view('welcome',compact('pendingItem','completeItem'));
    }

    public function updateItems(Request $request)
    {
    	$input = $request->all();

    	foreach ($input['pendingArr'] as $key => $value) {
    		$key = $key+1;
    		Item::where('id',$value)->update(['status'=>0,'order'=>$key]);
    	}

    	foreach ($input['completeArr'] as $key => $value) {
    		$key = $key+1;
    		Item::where('id',$value)->update(['status'=>1,'order'=>$key]);
    	}

    	return response()->json(['status'=>'success']);
    }
}
