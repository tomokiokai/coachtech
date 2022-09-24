<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Favorite;
use App\Models\Review;
use App\Models\Admin;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{
   public function index()
    {
        $shops = Shop::where('admin_id', Auth::user()->id)->get();
        $areas = Area::all();
        $genres = Genre::all();
        $user = Auth::user();
        $user_id = Auth::id();

        $param = [
        'shops' =>$shops,
        'areas' =>$areas,
        'genres' =>$genres,
        'user' =>$user,
        'user_id' =>$user_id
        ];
        return view('admin.management', $param);
    }

    public function create(EditRequest $request)
    {
        $form  = $request->all();
        Shop::create($form);
        return redirect()->back();
    }

    public function detail(Request $request)
    {
        $shop = Shop::find($request->shop_id);
        $user_id = Auth::id();
        $reserves = Reserve::where('shop_id', $request->shop_id)->get();
        
        $reviews = Review::where('shop_id', $request->shop_id)->get();
        $user = Auth::user();
        $areas = Area::all();
        $genres = Genre::all();

        $param = [
        'shop' =>$shop,
        'user_id' =>$user_id,
        'reserves' =>$reserves,
        'user' =>$user,
        'areas' =>$areas,
        'genres' =>$genres,
        'reviews' =>$reviews
        ];
        
        return view('admin/detail',$param);
    }

    public function update(EditRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Shop::find($request->shop_id)->update($form);
        return redirect('admin/management');
    }
}
