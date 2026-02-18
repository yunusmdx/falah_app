<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Starlink extends Model
{
    protected $fillable = [
        'kit_name',
        'location',
        'starlink_id',
        'router_id',
        'serial_number',
        'status',
        'email',
        'note',
        'division',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
