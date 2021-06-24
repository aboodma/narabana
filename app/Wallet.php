<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $appends  = ["created_at_human"];
    public function getCreatedAtHumanAttribute(){
        \Carbon\Carbon::setLocale('en');
        return \Carbon\Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']))->diffForHumans() ;
    }
    /**
     * Get the user that owns the Wallet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
