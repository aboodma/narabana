<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the ProviderType that owns the Provider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ProviderType()
    {
        return $this->belongsTo(ProviderType::class);
    }

    /**
     * Get the Country that owns the Provider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
}
