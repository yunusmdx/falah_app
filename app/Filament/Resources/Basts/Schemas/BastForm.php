<?php

namespace App\Filament\Resources\Basts\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\CheckboxList;
use Filament\Actions\Action;
use Filament\Forms\Components\Actions;


class BastForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Grid::make(1)->schema([

                /*
                =====================
                NOMOR & TANGGAL
                =====================
                */
                Grid::make(6)->schema([

                    TextInput::make('no_bast')
                        ->label('Nomor BAST')
                        ->disabled()
                        ->dehydrated()
                        ->inlineLabel()
                        ->default(function () {

                            $now = now();

                            $bulanRomawi = [
                                1=>'I',2=>'II',3=>'III',4=>'IV',
                                5=>'V',6=>'VI',7=>'VII',8=>'VIII',
                                9=>'IX',10=>'X',11=>'XI',12=>'XII',
                            ];

                            $bulan = $bulanRomawi[$now->month];
                            $tahun = $now->year;

                            $lastNumber = \App\Models\Bast::whereYear('created_at', $tahun)
                                ->whereMonth('created_at', $now->month)
                                ->latest('id')
                                ->value('no_bast');

                            preg_match('/(\d+)$/', $lastNumber ?? '', $matches);
                            $lastUrut = isset($matches[1]) ? (int) $matches[1] : 0;

                            $nomor = str_pad($lastUrut + 1, 3, '0', STR_PAD_LEFT);

                            return "BAST/FTG/{$bulan}/{$tahun}/{$nomor}";
                        })
                        ->columnSpan(3),

                    DatePicker::make('tanggal')
                        ->label('Tanggal')
                        ->inlineLabel()
                        ->required()
                        ->default(now())
                        ->columnSpan(3),
                ]),

                /*
                =====================
                PIHAK PERTAMA & KEDUA
                =====================
                */
                Grid::make(1)->schema([

                    Section::make('PIHAK PERTAMA')
                        ->columns(1)
                        ->schema([
                            TextInput::make('pihak_pertama_nama')->label('Nama')->inlineLabel()->required()->columnSpanFull(),
                            TextInput::make('pihak_pertama_jabatan')->label('Jabatan')->inlineLabel()->required()->columnSpanFull(),
                            TextInput::make('pihak_pertama_perusahaan')->label('Perusahaan')->inlineLabel()->required()->columnSpanFull(),
                        ]),

                    Section::make('PIHAK KEDUA')
                        ->columns(1)
                        ->schema([
                            TextInput::make('pihak_kedua_nama')->label('Nama')->inlineLabel()->required()->columnSpanFull(),
                            TextInput::make('pihak_kedua_jabatan')->label('Jabatan')->inlineLabel()->required()->columnSpanFull(),
                            TextInput::make('pihak_kedua_perusahaan')->label('Perusahaan')->inlineLabel()->required()->columnSpanFull(),
                        ]),
                ]),

                /*
                =====================
                LAMPIRAN KIT STARLINK
                =====================
                */
               Repeater::make('lampirans')
                    ->relationship()
                    ->hiddenLabel()
                    ->reorderable(false)
                    ->defaultItems(1)
                    ->addActionLabel('+ Tambah KIT Starlink')
                    ->itemLabel(fn () => null)
                    ->collapsible(false)
                    ->schema([
                        Grid::make(12)
                        ->schema([
                            Select::make('starlink_id')
                                ->hiddenLabel()
                                ->placeholder('Pilih KIT Starlink')
                                ->relationship('starlink', 'kit_name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->columnSpan(11),

                        ]),
                    ])
                    ->itemLabel('Lampiran KIT Starlink')
                    
                    ->deleteAction(fn (Action $action) =>
                        $action
                            ->icon('heroicon-m-trash')
                            ->color('danger')
                            ->extraAttributes([
                                'class' => 'mt-6' // bikin turun sejajar field
                            ])
                    )
                    ->columnSpanFull(),

                /*
                =====================
                CHECKLIST INFORMASI KIT
                =====================
                */
                Section::make('Informasi KIT Starlink')
                    ->schema([
                        CheckboxList::make('keterangan_fields')
                            ->hiddenLabel()
                            ->columns(2)
                            ->options([
                                'kit_name' => 'KIT Name',
                                'status' => 'Status',
                                'serial_number' => 'Serial Number',
                                'starlink_id' => 'Starlink ID',
                                'router_id' => 'Router ID',
                                'location' => 'Lokasi',
                                'email' => 'Email',
                                'division' => 'Divisi',
                            ])
                            ->default([
                                'kit_name',
                                'status',
                                'serial_number',
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                /*
                =====================
                KETERANGAN TAMBAHAN
                =====================
                */
                Textarea::make('keterangan')
                    ->label('Keterangan Tambahan')
                    ->rows(3)
                    ->columnSpanFull(),
            ]),
        ]);
    }
}
