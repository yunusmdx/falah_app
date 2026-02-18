<?php

namespace App\Exports;

use App\Models\Starlink;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StarlinksExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Starlink::select(
            'id',
            'kit_name',
            'status',
            'serial_number',
            'starlink_id',
            'router_id',
            'division',
            'location',
            'email',
            'note',
            'created_at',
            'updated_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'NO',
            'KIT STARLINK',
            'STATUS',
            'SERIAL NUMBER',
            'STARLINK ID',
            'ROUTER ID',
            'DIVISI',
            'LOKASI',
            'EMAIL',
            'NOTE',
            'CREATED AT',
            'UPDATED AT',
        ];
    }

    public function map($row): array
    {
        static $no = 1;
        
        return [
            $no++,
            strtoupper($row->kit_name),
            strtoupper($row->status),
            $row->serial_number,
            $row->starlink_id,
            $row->router_id,
            strtoupper($row->division ?? '-'),
            strtoupper($row->location),
            $row->email,
            $row->note ?? '-',
            $row->created_at?->format('d-m-Y H:i:s'),
            $row->updated_at?->format('d-m-Y H:i:s'),
        ];
    }
}
