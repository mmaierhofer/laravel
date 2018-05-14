<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id','book','price'
    ];

    public function order() : \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->BelongsTo('App\Order');
    }
}
