<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','brutto','netto'];

    public function books() : \Illuminate\Database\Eloquent\Relations\BelongsToMany {
        return $this->belongsToMany('App\Book');
    }
}
