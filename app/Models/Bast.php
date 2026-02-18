<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bast extends Model
{
    protected $fillable = [

        'no_bast',
        'tanggal',

        'pihak_pertama_nama',
        'pihak_pertama_jabatan',
        'pihak_pertama_perusahaan',

        'pihak_kedua_nama',
        'pihak_kedua_jabatan',
        'pihak_kedua_perusahaan',

        'keterangan',

        'keterangan_fields', // WAJIB TAMBAH INI

        'status',

    ];


    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */

    protected $casts = [

        'tanggal' => 'date',

        'keterangan_fields' => 'array', // WAJIB untuk checklist

    ];


    /*
    |--------------------------------------------------------------------------
    | AUTO GENERATE NOMOR
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::creating(function ($bast) {

            if (empty($bast->no_bast)) {

                $bast->no_bast = self::generateNoBast();

            }

        });
    }


    public static function generateNoBast(): string
    {
        $year  = now()->year;
        $month = now()->month;

        $last = self::whereYear('created_at', $year)
            ->orderByDesc('id')
            ->first();


        $lastNumber = 0;

        if ($last && preg_match('/BAST\/(\d{3})\//', $last->no_bast, $m)) {

            $lastNumber = (int) $m[1];

        }


        $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        $romanMonth = self::toRoman($month);

        return "BAST/{$nextNumber}/{$romanMonth}/{$year}";
    }



    public static function toRoman(int $number): string
    {
        return [

            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',

        ][$number];
    }



    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */


    // OPTIONAL (tidak wajib jika pakai lampirans)
    public function starlink()
    {
        return $this->belongsTo(Starlink::class);
    }



    // WAJIB untuk multi starlink

    public function lampirans()
    {
        return $this->hasMany(BastLampiran::class);
    }


}
