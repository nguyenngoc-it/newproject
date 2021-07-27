<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
public $timestamps= false;

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function billDetail(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(billDetail::class);
    }
}
