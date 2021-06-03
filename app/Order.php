<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function details()
    {
        return $this->hasOne(OrderDetail::class);
    }
    public function rate()
    {
        return $this->hasOne(OrderReview::class);
    }
    
}
