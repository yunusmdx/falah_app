<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Starlink;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'starlink_id',
        'payment_month',
        'amount',
        'status',
    ];

    /**
     * Get the starlink that owns the payment.
     */
     public function starlink()
    {
        return $this->belongsTo(Starlink::class);
    }
}
