<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

protected $fillable = ['shop_name', 'comment', 'image', 'area_id', 'genre_id','admin_id'];

    public function area(){
	return $this->belongsTo('App\Models\Area');
}

    public function genre(){
	return $this->belongsTo('App\Models\Genre');
}


public function favorites() {
        return $this->hasMany('App\Models\Favorite');
    }

public function is_liked_by_auth_user()
  {
    $id = Auth::id();

    $favorites = array();
    foreach($this->favorites as $favorite) {
      array_push($favorites, $favorite->user_id);
    }

    if (in_array($id, $favorites)) {
      return true;
    } else {
      return false;
    }
  }

}
