<?php

namespace App\Filament\Resources\Payments\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('starlink.kit_name')
                ->label('KIT Starlink')
                // ->sortable()
                ->searchable(),

            TextColumn::make('payment_month')
                ->label('Bulan Pembayaran')
                ->date('F Y'),

            TextColumn::make('status')
                ->badge()
                ->color(fn ($state) => $state === 'paid' ? 'success' : 'danger'),
        ])
        ->filters([
            SelectFilter::make('starlink_id')
                ->label('KIT Starlink')
                ->relationship('starlink', 'kit_name')
                ->searchable(),
        ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
