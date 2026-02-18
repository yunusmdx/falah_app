<?php

namespace App\Filament\Resources\Starlinks\Pages;

use App\Filament\Resources\Starlinks\StarlinkResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StarlinksExport;

class ListStarlinks extends ListRecords
{
    protected static string $resource = StarlinkResource::class;

    public function getTitle(): string
    {
        return 'Data Starlink';
    }

    protected function getHeaderActions(): array
    {
        return [

            CreateAction::make(),
            Action::make('export')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(fn () =>
                    Excel::download(
                        new StarlinksExport,
                        'starlinks-' . now()->format('Ymd_His') . '.xlsx'
                    )
                ),
        ];
    }

    // 🔥 hanya halaman admin/starlinks yang lebih lebar
    public function getMaxContentWidth(): ?string
    {
        return 'max-w-[1800px]';
    }
}
