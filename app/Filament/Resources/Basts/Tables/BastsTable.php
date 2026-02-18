<?php

namespace App\Filament\Resources\Basts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BastsTable
{
    public static function configure(Table $table): Table
    {
        return $table

            ->recordUrl(null)

            ->columns([

                TextColumn::make('no_bast')
                    ->label('Nomor BAST'),

                TextColumn::make('tanggal')
                    ->date('d F Y')
                    ->label('Tanggal BAST')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('pihak_pertama_nama')
                    ->label('Nama Pihak Pertama')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('pihak_pertama_jabatan')
                    ->label('Jabatan Pihak Pertama')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('pihak_pertama_perusahaan')
                    ->label('Perusahaan Pihak Pertama')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('pihak_kedua_nama')
                    ->label('Nama Pihak Kedua')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('pihak_kedua_jabatan')
                    ->label('Jabatan Pihak Kedua')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('pihak_kedua_perusahaan')
                    ->label('Perusahaan Pihak Kedua')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i:s')
                    ->label('Dibuat')
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->dateTime('d M Y, H:i:s')
                    ->label('Diubah')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])


            // ->recordActions([
            //     Action::make('cetak')
            //         ->icon(Heroicon::Printer)
            //         ->iconButton()
            //         ->tooltip('Cetak')
            //         ->url(fn ($record) => route('bast.pdf', $record->id))
            //         // ->url(fn ($record) => route('bast.pdf', $record))
            //         ->openUrlInNewTab(),

            ->recordActions([

                Action::make('print')
                    ->label('')
                    ->icon(Heroicon::OutlinedPrinter)
                    ->tooltip('Print')
                    ->color('success')
                    ->iconButton()
                    ->url(fn ($record) => route('bast.pdf', ['bast' => $record->id]))
                    ->openUrlInNewTab(),

                Action::make('download')
                    ->icon(Heroicon::ArrowDownTray)
                    ->iconButton()
                    ->tooltip('Download')
                    ->url(fn ($record) => route('bast.pdf', $record).'?download=1'),
            
                EditAction::make()
                    ->iconButton()
                    ->tooltip('Edit')
                    ->color('gray'),

                // Action::make('delete')
                //     ->label('Delete')
                //     ->iconButton()
                //     ->icon(Heroicon::Trash)
                //     ->color('danger')
                //     ->tooltip('Hapus'),

            ]);
    }
}
