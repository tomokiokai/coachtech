<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
     public function like(Request $request)
    {
        Favorite::create([
            'shop_id' => $request->id,
            'user_id' => Auth::user()->id
        ]);
        
        return redirect()->back();
    }

    public function unlike(Request $request)
    {

        Favorite::where('shop_id',$request->id)->where('user_id',Auth::id())->delete();
        
        return redirect()->back();
    }
}
