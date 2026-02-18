<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BastLampiran extends Model
{
    public function bast()
    {
        return $this->belongsTo(Bast::class);
    }

        public function starlink()
    {
        return $this->belongsTo(Starlink::class);
    }

    protected $table = 'bast_lampirans';

    protected $fillable = [
        'bast_id',
        'starlink_id',
    ];
}
