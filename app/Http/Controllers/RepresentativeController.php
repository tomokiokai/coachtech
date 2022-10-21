<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

use App\Mail\TestMail;
use Mail;

class RepresentativeController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        $user = Auth::user();
        
        $param = [
        'admins' =>$admins,
        'user' =>$user
        ];
        
        return view('manager.management', $param);
    }

    public function create(Request $request)
    {
        $name  = $request->name;
        $email = $request->email;
        $password = $request->password;
        Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Admin::find($request->id)->delete();
        return redirect()->back();
    }
    
    
    
}
