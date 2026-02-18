<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('starlink_id')
                    ->label('KIT Name')
                    ->relationship(
                        name: 'starlink',
                        titleAttribute: 'kit_name'
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
