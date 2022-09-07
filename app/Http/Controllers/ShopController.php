<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
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
}
