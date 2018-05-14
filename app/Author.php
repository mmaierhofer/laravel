<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    protected $fillable =['firstName','lastName'];

    /**
     * image is assigned to book (n:1)
     */
    public function book():BelongsToMany {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }
}
