<?php

namespace App\Filament\Resources\Starlinks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;



class StarlinksTable
{
    public static function configure(Table $table): Table
    {
        return $table

            ->recordUrl(null)

            // // ✅ ini yang membuat bisa dipilih
            // ->selectable()

            // // ✅ warna saat dipilih
            // ->recordClasses(fn (Model $record) => [
            //     'cursor-pointer',
            //     'data-[selected]:bg-primary-50',
            //     'data-[selected]:dark:bg-primary-900/20',
            // ])
            
            ->columns([

                    TextColumn::make('id')
                    ->label('Nomor'),
                    
                    TextColumn::make('kit_name')
                    ->label('KIT Starlink')
                    ->searchable()
                    ->toggleable(),

                    TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => strtoupper($state))
                    ->color(fn ($state) => match ($state) {
                        'new' => 'indigo',
                        'aktif' => 'success',
                        'standby' => 'info',
                        'suspend' => 'warning',
                        'inactive' => 'danger',
                        default => 'secondary',
                    })
                    ->toggleable(),
                    
                    TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(),
                    
                    TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable()
                    ->toggleable(),
                    
                    TextColumn::make('division')
                    ->label('Divisi')
                    ->searchable()
                    ->toggleable(),
                    
                    TextColumn::make('serial_number')
                    ->label('Serial Number')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                    TextColumn::make('starlink_id')
                    ->label('ID Starlink')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                    TextColumn::make('router_id')
                    ->label('ID Router')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                    TextColumn::make('mikrotik')
                    ->label('Mikrotik')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                    TextColumn::make('note')
                    ->label('Note')
                    ->limit(50)
                    ->searchable()
                    // ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),

                    TextColumn::make('created_at')
                    ->dateTime()
                    // ->formatStateUsing(fn ($state) => $state?->format('d-m-Y H:i:s'))
                    // ->sortable()
                    ->dateTime('d M Y, H:i:s')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                    TextColumn::make('updated_at')
                    ->dateTime()
                    // ->formatStateUsing(fn ($state) => $state?->format('d-m-Y H:i:s'))
                    // ->sortable()
                    ->searchable()
                    ->dateTime('d M Y, H:i:s')
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->filters([
                //
            ])

            ->recordActions([
                // ViewAction::make()->iconButton(),
                EditAction::make()
                ->iconButton()
                ->color('gray')
                ->tooltip('Edit'),
                
                // \Filament\Actions\DeleteAction::make()
                // ->iconButton()
                // ->tooltip('Hapus'),
            ])

            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make()
                // ])

            ]);
    }
}
