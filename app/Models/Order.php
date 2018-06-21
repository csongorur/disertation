<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'status', 'user_id'];


    /**
     * Get products.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
