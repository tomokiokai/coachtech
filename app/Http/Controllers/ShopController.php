<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Favorite;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        $param = [
        'shops' =>$shops,
        'areas' =>$areas,
        'genres' =>$genres
        ];
        return view('index', $param);
    }

    public function detail(Request $request)
    {
        $shop = Shop::find($request->shop_id);
        $user_id = Auth::id();
        $reserves = Reserve::where('shop_id', $request->shop_id)->where('user_id',Auth::id())->get();
        
        $reviews = Review::where('shop_id', $request->shop_id)->get();

        $param = [
        'shop' =>$shop,
        'user_id' =>$user_id,
        'reserves' =>$reserves,
        'reviews' =>$reviews
        ];
        
        return view('detail',$param);
    }

    public function search(Request $request)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $area_id = $request->search_area;
        $genre_id = $request->search_genre;
        $shop_name = $request->shop_name; 
        $query = Shop::query();

        if (isset($shop_name)) {
        $query->where('shop_name' , 'LIKE BINARY',"%{$shop_name}%");
        }

        if (isset($area_id)) {
        $query->where('area_id', $area_id);
        }
        
        if (isset($genre_id)) {
        $query->where('genre_id', $genre_id);
        }

        $shops = $query->get();

        $param = [
            'areas' => $areas,
            'genres' => $genres,
            'shops' => $shops,
            'areas' => $areas,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
        ];
        return view('index', $param);
    }
    
    public function review(Request $request)
    {
        $form = $request->all();
        Review::create($form);

        $shop = Shop::find($request->shop_id);
        $user_id = Auth::id();
        $reserves = Reserve::where('shop_id', $request->shop_id)->where('user_id',Auth::id())->get();
        
        $reviews = Review::where('shop_id', $request->shop_id)->get();

        $param = [
        'shop' =>$shop,
        
        'user_id' =>$user_id,
        'reserves' =>$reserves,
        'reviews' =>$reviews
        ];
        
        return view('detail', $param);

        
    }
}
