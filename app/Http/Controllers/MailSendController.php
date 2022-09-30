<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentPosted;

class MailSendController extends Controller
{
    public function showForm()
    {

        
        $user = Auth::user();
        
        $param = [
        
        'user' =>$user
        ];
        return view('manager.comments.form', $param);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $comment = new Comment(['body' => $request->comment]);

        $user->comments()->save($comment);

        Mail::to($user)->send(new CommentPosted($user, $comment));

        return redirect('manager/comment/thanks');
    }

    public function thanks()
    {
        $comment = Auth::user()
            ->comments()
            ->orderBy('id', 'desc')
            ->first();

        return view('manager.comments.thanks', compact('comment'));
    }
}
