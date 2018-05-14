<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rating extends Model
{
    protected $fillable =['user_id','book_id','rating','comment', 'firstName', 'lastName'];

    public function book():\Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo('App\Book');
    }

    public function user() : BelongsTo {
        return $this->belongsTo('App\User');
    }

}
