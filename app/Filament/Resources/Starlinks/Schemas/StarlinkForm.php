<?php

namespace App\Filament\Resources\Starlinks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StarlinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('status')
                    ->label('Status Starlink')
                    ->options([
                        'new' => 'BARU', 
                        'aktif' => 'AKTIF', 
                        'standby' => 'STANDBY',
                        'suspend' => 'SUSPEND',
                        'inactive' => 'TIDAK AKTIF',
                        ])
                    ->default('new')
                    ->required(),
                
                TextInput::make('kit_name')
                    ->label('KIT Starlink')
                    ->maxLength(100)
                    ->required(),

                 TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(100)
                    ->required(),

                TextInput::make('serial_number')
                    ->label('Serial Number')
                    ->required(),

                TextInput::make('starlink_id')
                    ->unique(ignoreRecord: true)
                    ->label('ID Starlink')
                    ->required(),

                TextInput::make('router_id')
                    ->label('ID Router')
                    ->required(),
                
                TextInput::make('location')
                    ->label('Lokasi Starlink')
                    ->required(),

                TextInput::make('division')
                        ->label('Divisi Starlink')
                        ->maxLength(100)
                        ->required(),
                
                TextInput::make('mikrotik')
                        ->label('Mikrotik')
                        ->maxLength(100),                       

                Textarea::make('note')
                        ->label('Note')
                        ->rows(3)
                        ->columnSpanFull(),               
                
            ]);
    }
}
