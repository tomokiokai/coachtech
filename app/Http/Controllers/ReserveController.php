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
        
}
