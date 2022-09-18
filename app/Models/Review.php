<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['strars', 'comment', 'shop_id', 'user_id'];


    public function user(){
	return $this->belongsTo('App\Models\users');
}

public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }

}
