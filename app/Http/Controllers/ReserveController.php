<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Http\Requests\ReserveRequest;


class ReserveController extends Controller
{
   public function reserve(ReserveRequest $request)
    {   
        $form = $request->all();
        Reserve::create($form);
        return view('done');
    }

    public function remove(Request $request)
    {
        Reserve::find($request->id)->delete();
        return redirect()->back();
    }

    public function update(ReserveRequest $request)
    {
        $reserve = $request->all();
        unset($reserve['_token']);
        Reserve::where('id',$request->id)
        ->update($reserve);
        return redirect('mypage');
    }

    public function qrcode(Request $request)
    {
        $reserve = Reserve::find($request->id);
        return view('qrcode',$reserve);
    }

    public function proof(Request $request)
    {
        $reserve = Reserve::find($request)->first();
        return view('proof',compact('reserve'));
    }
        
}
