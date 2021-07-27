<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    public function bill(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(bill::class);
    }
}
