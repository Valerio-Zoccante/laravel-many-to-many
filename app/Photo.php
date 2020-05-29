<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    $fillable = [
        'user_id',
        'name',
        'path'
    ];

    public function user()
  {
      return $this->belongsTo('App\User');
  }
}
