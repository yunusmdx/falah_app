<?php

namespace App\Filament\Resources\Starlinks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StarlinkInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('kit_name'),
                TextEntry::make('status'),
                TextEntry::make('serial_number'),
                TextEntry::make('starlink_id'),
                TextEntry::make('router_id'),
                TextEntry::make('location'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('division'),
                TextEntry::make('note'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
