<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = ['isbn','title','subtitle','published','rating','description','user_id', 'price'];

    public function user() : BelongsTo {
        return $this->belongsTo('App\User');
    }

    public function images() : HasMany {
        return $this->hasMany('App\Image');
    }

    public function authors() : BelongsToMany {
        return $this->belongsToMany('App\Author')->withTimestamps();
    }

    public function ratings() : HasMany {
        return $this->hasMany('App\Rating');
    }

    public function orders() : BelongsToMany {
        return $this->belongsToMany('App\Order');
    }

}
